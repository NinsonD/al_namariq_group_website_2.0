<?php

namespace Modules\Currency\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Currency\Database\Factories\CurrencyFactory;

class Currency extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title', 'code', 'symbol', 'exchange_rate', 'is_default', 'status', 'symbol_position'];

    protected $casts = [
        'is_default' => 'boolean',
        'status' => 'boolean',
        'exchange_rate' => 'float',
    ];

}
