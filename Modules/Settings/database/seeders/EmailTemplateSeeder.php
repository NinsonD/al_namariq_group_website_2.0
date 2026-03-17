<?php

namespace Modules\Settings\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Settings\Models\EmailTemplate;

class EmailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $templates = [
            [
                'name' => 'password_reset',
                'subject' => 'Password Reset',
                'message' => '<p>Dear {{user_name}},</p>
                <p>Do you want to reset your password? Please Click the following link and Reset Your Password.</p>',
            ],
            [
                'name' => 'contact_mail',
                'subject' => 'Contact Email',
                'message' => '<p>Hello there,</p>
                <p>&nbsp;Mr. {{name}} has sent a new message. you can see the message details below.&nbsp;</p>
                <p>Email: {{email}}</p>
                <p>Subject: {{subject}}</p>
                <p>Message: {{message}}</p>',
            ],
            [
                'name' => 'subscribe_notification',
                'subject' => 'Subscribe Notification',
                'message' => '<p>Hi there, Congratulations! Your Subscription has been created successfully. Please Click the following link and Verified Your Subscription. If you will not approve this link, you can not get any newsletter from us.</p>',
            ],
            [
                'name' => 'user_verification',
                'subject' => 'User Verification',
                'message' => '<p>Dear {{user_name}},</p>
                <p>Congratulations! Your account has been created successfully. Please click the following link to activate your account.</p>',
            ],
            [
                'name' => 'blog_comment',
                'subject' => 'New Blog Comment',
                'message' => '<p>Hello {{admin_name}},</p>
                <p> A new pending comment has been added by <b>{{user_name}}</b> on <a href="{{link}}">{{blog_title}}</a></p>',
            ],
            [
                'name' => 'order_confirmation_mail',
                'subject' => 'Order Confirmation Mail',
                'message' => '<p>Hi {{user_name}},</p>
                            <p>Thank you for your order! We\'re excited to let you know that your order <strong>#{{order_id}}</strong> has been successfully submitted.</p>

                            <p>Here are the details of your order:</p>

                            <ul>
                                <li><strong>Sub Total:</strong> {{subtotal}}</li>
                                <li><strong>Discount:</strong> {{discount}}</li>
                                <li><strong>Tax:</strong> {{tax}}</li>
                                <li><strong>Shipping Charge:</strong> {{shipping_charge}}</li>
                                <li><strong>Total Amount:</strong> {{total_amount}}</li>
                                <li><strong>Payment Method:</strong> {{payment_method}}</li>
                                <li><strong>Payment Status:</strong> {{payment_status}}</li>
                                <li><strong>Order Status:</strong> {{order_status}}</li>
                                <li><strong>Order Date:</strong> {{order_date}}</li>
                            </ul>

                            <div>
                            <h3>Order Details:</h3>
                            {{order_detail}}
                            </div>

                            <p>If you have any questions about your order, feel free to reply to this email or contact our support team.</p>

                            <p>Thank you for shopping with us!</p>
                            <p><strong>- The {{company_name}} Team</strong></p>',
            ],
            [
                'name' => 'order_status',
                'subject' => 'Order Status Update',
                'message' => '<p>Dear {{user_name}},</p>
                            <p>We wanted to let you know that your order <strong>#{{order_id}}</strong> is now marked as <strong>{{order_status}}</strong>.</p>
                            <p>Thank you for shopping with us!</p>
                            <p><strong>- The {{company_name}} Team</strong></p>',

            ],
            [
                'name' => 'payment_status',
                'subject' => 'Payment Status Update',
                'message' => '<p>Dear {{user_name}},</p>
                            <p>We wanted to inform you that the payment status for your order <strong>#{{order_id}}</strong> is now <strong>{{payment_status}}</strong>.</p>
                            <p>If you have any questions regarding this payment, please feel free to contact our support team.</p>
                            <p>Thank you for shopping with us!</p>
                            <p><strong>- The {{company_name}} Team</strong></p>',

            ],

        ];

        foreach ($templates as $index => $template) {
            $new_template = new EmailTemplate();
            $new_template->name = $template['name'];
            $new_template->subject = $template['subject'];
            $new_template->message = $template['message'];
            $new_template->save();
        }
    }
}
