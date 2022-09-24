<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignUp extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'user_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email' => 'string',
        'user_id' => 'integer'
    ];
}
