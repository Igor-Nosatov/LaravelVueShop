<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shoes extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'title',
        'description',
        'style_code',
        'price',
        'gender_id',
        'category_id',
        'type_id',
        'sampler_id',
        'color_id',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string>
     */
    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'style_code' => 'string',
        'price' => 'integer',
        'gender_id' => 'integer',
        'category_id' => 'integer',
        'type_id' => 'integer',
        'sampler_id' => 'integer',
        'color_id' => 'integer',
    ];
    /**
     * @return BelongsToMany
     */
    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class, 'feature_shoes', 'feature_id', 'shoes_id');
    }
    /**
     * @return HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
    /**
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(Image::class, 'shoes_id');
    }
    /**
     * @return BelongsToMany
     */
    public function width(): BelongsToMany
    {
        return $this->belongsToMany(Width::class, 'shoes_width', 'shoes_id', 'width_id');
    }
    /**
     * @return BelongsToMany
     */
    public function size(): BelongsToMany
    {
        return $this->belongsToMany(Size::class, 'size_shoes','shoes_id', 'size_id' );
    }
    /**
     * @return BelongsTo
     */
    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }
    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    /**
     * @return BelongsTo
     */
    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }
    /**
     * @return BelongsTo
     */
    public function sampler(): BelongsTo
    {
        return $this->belongsTo(Sampler::class);
    }
    /**
     * @return BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
    public function scopeSearch($query, $title)
    {
        return $query->where('title', 'LIKE', "%{$title}%")
        ->orWhere('description', 'LIKE', "%{$title}%");
    }
}
