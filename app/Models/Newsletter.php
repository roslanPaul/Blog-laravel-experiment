<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Newsletter
 * @package App\Models
 * @version May 1, 2018, 10:04 pm UTC
 *
 * @property string name
 * @property string surname
 * @property string email
 */
class Newsletter extends Model
{
    use SoftDeletes;

    public $table = 'newsletters';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'surname',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'surname' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'surname' => 'required',
        'email' => 'email'
    ];

    
}
