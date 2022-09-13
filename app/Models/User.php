<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'role_id' => 'integer'
    ];

    /**
     * @return HasMany
     */
    public function cart(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * @return HasMany
     */
    public function checkout(): HasMany
    {
        return $this->hasMany(Checkout::class);
    }

  
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
