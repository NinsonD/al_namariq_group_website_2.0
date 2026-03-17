<?php

namespace Modules\Order\Enums;

enum OrderStatusEnum:string
{

    case DRAFT = 'draft';
    case PENDING = 'pending';
    case PROCESSING = 'processing';
    case COMPLETED = 'success';
    case CANCELED = 'canceled';
    case REJECTED = 'rejected';

    public static function getLabels($status): string
    {
        return match ($status) {
            self::PENDING => __('admin.pending'),
            self::PROCESSING => __('admin.processing'),
            self::COMPLETED => __('admin.completed'),
            self::CANCELED => __('admin.canceled'),
            self::REJECTED => __('admin.rejected'),
        };
    }

    public static function getAllValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function status($status)
    {
        return match ($status) {
            self::DRAFT => self::DRAFT->value,
            self::PENDING => self::PENDING->value,
            self::PROCESSING => self::PROCESSING->value,
            self::COMPLETED => self::COMPLETED->value,
            self::CANCELED => self::CANCELED->value,
            self::REJECTED => self::REJECTED->value,
        };
    }
}
