<?php

namespace Modules\Order\Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Modules\Coupon\Models\Coupon;
use Modules\Coupon\Models\CouponHistory;
use Modules\Currency\Models\Currency;
use Modules\Order\Models\Order;
use Modules\Order\Models\ShippingMethod;
use Modules\Payment\Models\Payment;
use Modules\Shop\Models\Address;
use Modules\Shop\Models\Product;
use Modules\Shop\Models\ProductReview;
use Str;

class UserOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where('type', 'user')->get();

        if($users->isNotEmpty()) {
            foreach ($users as $user) {
                $ordersCount = rand(1, 3);

                for ($i = 0; $i < $ordersCount; $i++) {

                    $products = Product::with(['translations'])->inRandomOrder()->take(rand(1, 3))->get();

                    // pick 1–4 random products
                    $orderProducts = [];

                    foreach ($products as $product) {
                        $qty = rand(1, 2);

                        if($qty > $product->qty) {
                            $qty = $product->qty;
                        }
                        elseif($product->qty == 0) {
                            continue;
                        }

                        $price = $product->sale_price ? $product->sale_price : $product->price;

                        $orderProducts[] = [
                            'product_id'    => $product->id,
                            'product_title' => $product->title,
                            'qty'           => $qty,
                            'price_default' => $price,
                            'price'         => themeCurrency($price, false, false),
                        ];

                        $product->decrement('qty', $qty);

                    }

                    $subtotal = collect($orderProducts)->sum(function ($orderProduct) {
                        return $orderProduct['price_default'] * $orderProduct['qty'];
                    });

                    $tax = $subtotal * 0.10; // 10% tax

                    $coupon = Coupon::all()->random();

                    $discount = 0;

                    if($subtotal >= $coupon->min_price && $coupon->status && now()->toDateString() >= $coupon->start_date && now()->toDateString() <= $coupon->end_date) {
                        $discount = $coupon->discount_type === 'percentage' ? ($subtotal * $coupon->discount / 100) : $coupon->discount ?? 0;
                        if ($discount > $subtotal) {
                            $discount = 0;
                        }
                    } else {
                        $coupon = null;
                    }


                    $shipping = ShippingMethod::inRandomOrder()->first()->fee;
                    $amount = ($subtotal - $discount) + ($tax + $shipping);


                    $gateway_charge = Payment::inRandomOrder()->first()->value['gateway_charge'] ?? 0;

                    $currency = Currency::where('is_default', 1)->first()?->code ?? 'USD';


                    $order = Order::create([
                        'user_id' => $user->id,
                        'order_no' => 'ORD-'.strtoupper(uniqid()),

                        'subtotal_default'        => $subtotal,
                        'tax_default'             => $tax,
                        'discount_default'        => $discount,
                        'shipping_charge_default' => $shipping,
                        'amount_default'          => $amount,

                        'subtotal'                => themeCurrency($subtotal, false, false),
                        'tax'                     => themeCurrency($tax, false, false),
                        'discount'                => themeCurrency($discount, false, false),
                        'shipping_charge'         => themeCurrency($shipping, false, false),
                        'paid_amount'             => themeCurrency($amount, false, false),

                        'gateway_charge'          => $gateway_charge,
                        'payable_with_charge'     => $amount + $gateway_charge,
                        'paid_currency'           => $currency,

                        'payment_method'          => fake()->randomElement([1, 2, 3]),
                        'transaction_id'          => strtoupper(Str::random(12)),
                        'payment_status' => fake()->randomElement([
                                                                'success', 'success', 'success', 'success', 'success', 'success', 'success', // 70%
                                                                'pending', 'rejected', 'rejected' // 30%
                                                            ]),
                        'order_status' => fake()->randomElement([
                                                                'success', 'success', 'success', 'success', 'success', 'success', 'success', // 70%
                                                                'draft', 'pending', 'processing', 'refund', 'rejected' // 30%
                                                            ]),
                        'payment_details'         => json_encode(['transaction_ref' => strtoupper(Str::random(8))]),
                        'order_note'              => "This is a sample order note.",
                        'created_at'              => Carbon::now()->subDays(rand(0, 89))->setTime(rand(0,23), rand(0,59), rand(0,59)),
                    ]);

                    if($discount > 0 && $coupon && $order->payment_status === 'success' && $order->order_status !== 'rejected') {
                        CouponHistory::create([
                            'coupon_id' => $coupon->id,
                            'user_id'   => $user->id,
                            'order_id'  => $order->id,
                            'coupon_code' => $coupon->coupon_code,
                            'discount_amount' => $discount,
                        ]);
                    }


                    $order->orderProducts()->createMany($orderProducts);

                    // add order address
                    $address = Address::where('user_id', $user->id)->first();
                    if ($address) {

                        $order->address()->create([
                            'order_id'            => $order->id,
                            'billing_first_name'  => $address->first_name,
                            'billing_last_name'   => $address->last_name,
                            'billing_email'       => $address->email,
                            'billing_phone'       => $address->phone,
                            'billing_address'     => $address->address,
                            'billing_province'    => $address->province,
                            'billing_city'        => $address->city,
                            'billing_zip_code'    => $address->zip_code,
                            'billing_country'     => $address->country,

                            'shipping_first_name' => $address->first_name,
                            'shipping_last_name'  => $address->last_name,
                            'shipping_email'      => $address->email,
                            'shipping_phone'      => $address->phone,
                            'shipping_address'    => $address->address,
                            'shipping_province'   => $address->province,
                            'shipping_city'       => $address->city,
                            'shipping_zip_code'   => $address->zip_code,
                            'shipping_country'    => $address->country,
                        ]);
                    }

                    $refundReasons = [
                        'Received a damaged product',
                        'Item not as described',
                        'Wrong product delivered',
                        'Order arrived late',
                        'Size/fit issue',
                        'Changed my mind',
                        'Payment charged twice',
                    ];

                    $adminResponses = [
                        'Refund request is being reviewed',
                        'Refund has been processed successfully',
                        'Refund request rejected due to invalid reason',
                        'Partial refund granted after review',
                        'Refund will be credited within 5-7 business days',
                    ];


                    // check if order is refunded
                    if (in_array($order->order_status, ['refund'])) {
                        $order->refund()->create([
                            'user_id' => $user->id,
                            'order_id'  => $order->id,
                            'refund_amount'  => $order->paid_amount,
                            'reason'  => $refundReasons[array_rand($refundReasons)],
                            'admin_response'  => $adminResponses[array_rand($adminResponses)],
                            'status'  => fake()->randomElement(['pending', 'rejected', 'success']),
                        ]);
                    }

                    $reviewComments = [
                        "Excellent product, exactly what I wanted! The build quality is top-notch and it arrived well-packaged and on time.",
                        "Good quality for the price. It performs as described and is perfect for my needs. Definitely a worthwhile purchase.",
                        "Fast delivery and well-packaged. The product works flawlessly and exceeded my expectations in every aspect possible.",
                        "Product works as expected, very satisfied. The customer service was helpful and the packaging kept it safe during shipping.",
                        "Quality could be better, but overall happy. The product meets my expectations and serves its purpose very well.",
                        "Love it! Highly recommended for anyone looking for this type of product. Great value and excellent craftsmanship.",
                        "Decent product, but shipping took too long. Still, the item is good and performs its function perfectly once received.",
                        "Amazing value for the money. The product arrived quickly, works perfectly, and looks even better than the pictures.",
                        "I am very satisfied with this purchase. The product is durable, easy to use, and exactly as described on the site.",
                        "Product arrived on time and works perfectly. The quality is impressive, and I would definitely buy from this seller again.",
                        "The item exceeded my expectations in terms of quality and performance. Customer service was prompt and helpful too.",
                        "Solid product with excellent functionality. The design is sleek, the material feels premium, and it works flawlessly.",
                        "Product is good but packaging could be improved. Works exactly as advertised and I am happy with my purchase overall.",
                        "Highly recommend! The product is efficient, durable, and arrived quickly. Definitely a 5-star experience from me.",
                        "Very pleased with this product. Excellent quality, performs as promised, and the delivery was faster than expected.",
                    ];


                    // add a product review for one of the products in the order
                    if (rand(0, 1) && count($orderProducts) > 0) {
                        // $reviewedProduct = $orderProducts[array_rand($orderProducts)];

                        foreach ($orderProducts as $orderIndex => $reviewedProduct) {
                            // 50% chance to review each product
                            if (rand(0, 1) == 0) {
                                continue;
                            }

                            ProductReview::create([
                                'user_id'    => $user->id,
                                'product_id' => $reviewedProduct['product_id'],
                                'rating'     => rand(3, 5),
                                'comment'    => $reviewComments[rand(0, count($reviewComments) - 1)],
                                'status'     => 1,
                            ]);
                        }
                    }
                }
            }
        }
    }
}
