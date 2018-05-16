<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Article
 * @package App\Models
 * @version May 1, 2018, 9:18 pm UTC
 *
 * @property string title
 * @property string thumb_img
 * @property string normal_img
 * @property string content
 * @property integer user_id
 * @property integer category_id
 */
class Article extends Model
{
    use SoftDeletes;

    public $table = 'articles';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'image',
        'content',
        'keywords',
        'category_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'image' => 'string',
        'content' => 'string',
        'category_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title'       => 'required',
        'image'       => 'required',
        'content'     => 'required',
        'keywords'    => 'required',
        'category_id' => 'numeric'
    ];

     public function keywords() 
    {
        return $this->belongsToMany('App\Models\Keyword');
    }

    /**
     * Get the user who wrote the article
     * @return [type] [description]
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category of the article
     * @return [type] [description]
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
