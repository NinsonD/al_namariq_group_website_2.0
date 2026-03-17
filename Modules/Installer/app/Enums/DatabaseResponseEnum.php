<?php

namespace Modules\Installer\Enums;

enum DatabaseResponseEnum: string
{
    case DATABASE_NOT_FOUND = 'database_not_found';
    case TABLE_EXISTS = 'table_exists';
    case CONNECTION_FAILED = 'connection_failed';
    case RESET_DATABASE = 'reset_database';
    case DATABASE_CONNECTION_SUCCESS = 'database_connection_success';
    case DATABASE_MIGRATION_SUCCESS = 'database_migration_success';
    case DATABASE_MIGRATION_FAILED = 'database_migration_failed';
}