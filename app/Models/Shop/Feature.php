<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Feature extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string>
     */
    protected $casts = [
        'name' => 'string',
    ];

    /**
     * @return BelongsToMany
     */
    public function shoes(): BelongsToMany
    {
        return $this->belongsToMany(Shoes::class,'feature_shoes','feature_id','shoes_id');
    }
}
