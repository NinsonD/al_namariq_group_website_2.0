<?php

namespace Modules\Installer\Enums;

enum InstallStepEnum: string
{
    case LICENSE = 'license';
    case REQUIREMENTS = 'requirements';
    case ACCOUNT = 'account';
    case DATABASE = 'database';
    case CONFIGURATION = 'configuration';
    case SMTP = 'smtp';
    case COMPLETE = 'complete';

    public static function all(): array
    {
        return [
            self::LICENSE,
            self::REQUIREMENTS,
            self::DATABASE,
            self::ACCOUNT,
            self::CONFIGURATION,
            self::SMTP,
            self::COMPLETE,
        ];
    }
}
