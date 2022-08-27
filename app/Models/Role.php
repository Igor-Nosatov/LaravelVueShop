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
 *
 */

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = ['name'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
    ];
}
