<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 *
 * @package App\Models
 */
class Category extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'is_active'
    ];
}
