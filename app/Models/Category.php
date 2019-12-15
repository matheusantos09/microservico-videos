<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 *
 * @package App\Models
 */
class Category extends Model
{

    use SoftDeletes, Uuid;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'is_active'
    ];

    protected $dates = [
        'deleted_at'
    ];

    protected $casts = [
        'id' => 'string'
    ];

}
