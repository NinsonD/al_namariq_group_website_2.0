<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Order\Models\ShippingMethod;

class ShippingMethodTranslation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title', 'locale'];

    public function shipping(){
        return $this->belongsTo(ShippingMethod::class, 'shipping_method_id');
    }
}
