<?php

namespace App\Models;

use Modules\Blog\Models\Blog;
use Modules\Order\Models\Order;
use Modules\Shop\Models\Address;
use Modules\Shop\Models\ProductReview;
use Modules\Shop\Models\Wishlist;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomPasswordResetNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'type',
        'status',
        'designation',
        'phone',
        'address',
        'zip_code',
        'social_links',
        'avatar',
        'bio',
        'verification_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'social_links' => 'array',

        ];
    }

    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new CustomPasswordResetNotification($token));
    }

    public function getInitialsAttribute(): string
    {
        return substr($this->name, 0, 1);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'user_id');
    }

    public function address()
    {
        return $this->hasMany(Address::class, 'user_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'user_id');
    }

    public function scopeVerified($query)
    {
        return $query->where('email_verified_at', '!=', null);
    }
    public function scopeUnverified($query)
    {
        return $query->where('email_verified_at', null);
    }
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive');
    }
    public function scopeSuspended($query)
    {
        return $query->where('status', 'suspended');
    }
    public function scopeAdmin($query)
    {
        return $query->where('type', 'admin');
    }
    public function scopeUser($query)
    {
        return $query->where('type', 'user');
    }
}
