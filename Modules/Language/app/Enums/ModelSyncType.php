<?php

namespace Modules\Language\Enums;

enum ModelSyncType:string 
{
    case UPDATE = 'update';
    case CREATE = 'create';
    case DELETE = 'delete';

}
