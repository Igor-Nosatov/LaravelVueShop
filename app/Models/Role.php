<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Role Model
 * @package App\Models;
 *
 * @property int id
 * @property string name
 *
 * @property-read Role $role
 */
class Role extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'roles';

    /**
     * @var string[]
     */
    protected $fillable = ['name'];

    /**
     * @var string[]
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
    ];
}
