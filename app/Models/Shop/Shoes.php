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
        return $this->belongsToMany(Size::class, 'size_shoes', 'shoes_id', 'size_id');
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

    //========Scopes Filters=============

    /**
     * @param $query
     * @param $categoryId
     * @return mixed
     */
    public function scopeCategoryFilter($query, $categoryId): mixed
    {
        return  $query->whereHas('category', function ($query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        });
    }

    /**
     * @param $query
     * @param $typeId
     * @return mixed
     */
    public function scopeTypeFilter($query, $typeId): mixed
    {
        return $query->whereHas('type', function ($query) use ($typeId) {
            $query->where('type_id', $typeId);
        });
    }

    /**
     * @param $query
     * @param $genderId
     * @return mixed
     */
    public function scopeGenderFilter($query, $genderId): mixed
    {
        return  $query->whereHas('gender', function ($query) use ($genderId) {
            $query->where('gender_id', $genderId);
        });
    }

    /**
     * @param $query
     * @param $samplerId
     * @return mixed
     */
    public function scopeSamplerFilter($query, $samplerId): mixed
    {
        return   $query->whereHas('sampler', function ($query) use ($samplerId) {
            $query->where('sampler_id', $samplerId);
        });
    }

    /**
     * @param $query
     * @param $colorId
     * @return mixed
     */
    public function scopeColorFilter($query, $colorId): mixed
    {
        return  $query->whereHas('color', function ($query) use ($colorId) {
            $query->where('color_id', $colorId);
        });
    }

    /**
     * @param $query
     * @param $sizesId
     * @return mixed
     */
    public function scopeSizeFilter($query, $sizesId): mixed
    {
        return $query->whereHas('size', function ($query) use ($sizesId) {
            $query->where('size_id', $sizesId);
        });
    }

    /**
     * @param $query
     * @param $widthId
     * @return mixed
     */
    public function scopeWidthFilter($query, $widthId): mixed
    {
        return $query->whereHas('width', function ($query) use ($widthId) {
            $query->where('width_id', $widthId);
        });
    }

    /**
     * @param $query
     * @param $title
     * @return mixed
     */
    public function scopeSearch($query, $title): mixed
    {
        return $query->where('title', 'LIKE', "%{$title}%")
            ->orWhere('description', 'LIKE', "%{$title}%");
    }
}
