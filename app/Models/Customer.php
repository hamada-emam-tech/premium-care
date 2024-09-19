<?php

namespace App\Models;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens as SanctumHasApiTokens;

/**
 * @method \App\Models\Address|\Illuminate\Support\Collection|null syncAddress(array $shippingAddress)
 */
class Customer extends Authenticatable
{
    use CanResetPassword, SanctumHasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function addresses()
    {
        // return $this->hasOne(Address::class,'address_id' );
    }

    public function tickets()
    {
        // return $this->hasMany(Ticket::class)->orderByDesc('created_at');
    }

    public function scopeOrdered($query)
    {
        $query->orderbydesc('created_at');
    }
}
