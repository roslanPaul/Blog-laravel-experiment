<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models
 * @version May 1, 2018, 9:15 pm UTC
 *
 * @property string name
 * @property string description
 * @property string thumb_img
 * @property string normal_img
 */
class Category extends Model
{
    use SoftDeletes;

    public $table = 'categories';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'description',
        'thumb_img',
        'normal_img'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'thumb_img' => 'string',
        'normal_img' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'description' => 'required',
        'thumb_img' => '',
        'normal_img' => ''
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
