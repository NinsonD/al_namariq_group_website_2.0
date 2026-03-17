<?php

namespace Modules\Shop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Modules\Shop\Models\Product;
use Modules\Shop\Models\Cart;

class CartItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['cart_id','product_id', 'qty', 'price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public static function getCartForUser()
    {
        if (Auth::check() && Auth::user()->type === 'user') {
            $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

            return self::with(['product', 'product.translations'])->where('cart_id', $cart->id)->get();
        }

        return collect([]);
    }

    public function getCartAmounts($cartItems)
    {
        $subtotal = $cartItems->sum(fn($item) => ($item->product->sale_price ?? $item->product->price) * $item->qty);

        // For now, total = subtotal. Later can integrate coupon/discount.
        $total = $subtotal;

        return compact('subtotal', 'total');
    }
}
