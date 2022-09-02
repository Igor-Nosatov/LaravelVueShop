<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Cart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'quantity',
        'promo_code',
        'shipped_days',
        'shoes_id',
        'user_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'id'=> 'integer',
        'quantity' => 'integer',
        'promo_code' => 'integer',
        'shipped_days' => 'string',
        'shoes_id' => 'integer',
        'user_id' => 'integer',
    ];

    /**
     * @return HasMany
     */
    public function shoes():HasMany
    {
        return $this->hasMany(Shoes::class);
    }

    /**
     * @return BelongsTo
     */
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function checkout(): HasMany
    {
        return $this->hasMany(Checkout::class);
    }
}
