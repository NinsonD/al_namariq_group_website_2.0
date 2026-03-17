<?php

namespace App\Enums;

enum RedirectMessage: string
{
    case CREATE = 'Created successfully.';
    case UPDATE = 'Updated successfully.';
    case DELETE = 'Deleted successfully.';
    case ERROR = 'Something went wrong.';

    public static function getAll(): array
    {
        return [
            RedirectType::CREATE->value => self::CREATE->value,
            RedirectType::UPDATE->value => self::UPDATE->value,
            RedirectType::DELETE->value => self::DELETE->value,
            RedirectType::ERROR->value => self::ERROR->value,
        ];
    }
}
