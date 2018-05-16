<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Keyword
 * @package App\Models
 * @version May 1, 2018, 9:19 pm UTC
 *
 * @property string word
 */
class Keyword extends Model
{
    use SoftDeletes;

    public $table = 'keywords';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'word'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'word' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'word' => 'required'
    ];

    public function articles()
    {
        return $this->belongsToMany('App\Models\Article');
    }
}
