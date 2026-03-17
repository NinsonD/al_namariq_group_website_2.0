<?php

namespace Modules\Order\Enums;

enum OrderPaymentStatusEnum:string
{
    case PENDING = 'pending';
    case COMPLETED = 'success';
    case REJECTED = 'rejected';
    case REFUND = 'refund';

    public static function getLabels($status): string
    {
        return match ($status) {
            self::PENDING => __('admin.pending'),
            self::COMPLETED => __('admin.completed'),
            self::REJECTED => __('admin.rejected'),
            self::REFUND => __('admin.refund'),
        };
    }

    public static function getAllValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function status($status)
    {
        return match ($status) {
            self::PENDING => self::PENDING->value,
            self::COMPLETED => self::COMPLETED->value,
            self::REJECTED => self::REJECTED->value,
            self::REFUND => self::REFUND->value,
        };
    }
}
