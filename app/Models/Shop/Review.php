<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Review extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'review_headline',
        'nickname',
        'comment',
        'rating',
        'image',
        'location',
        'email',
        'policy_agree',
        'user_id',
        'shoes_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string>
     */
    protected $casts = [
        'review_headline' => 'string',
        'nickname' => 'string',
        'comment' => 'string',
        'rating' => 'integer',
        'image' => 'string',
        'location' => 'string',
        'email' => 'string',
        'policy_agree' => 'boolean',
        'user_id' => 'integer',
        'shoes_id' => 'integer',
    ];

    /**
     * @return BelongsTo
     */
    public function shoes(): BelongsTo
    {
        return $this->belongsTo(Shoes::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
