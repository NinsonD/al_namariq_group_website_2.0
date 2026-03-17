<?php

namespace Modules\Shop\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['user_id', 'title', 'first_name', 'last_name', 'email', 'phone', 'province', 'city', 'address', 'zip_code', 'country'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
