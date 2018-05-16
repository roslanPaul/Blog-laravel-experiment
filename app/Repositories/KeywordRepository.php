<?php

namespace App\Repositories;

use App\Models\Keyword;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KeywordRepository
 * @package App\Repositories
 * @version May 1, 2018, 9:19 pm UTC
 *
 * @method Keyword findWithoutFail($id, $columns = ['*'])
 * @method Keyword find($id, $columns = ['*'])
 * @method Keyword first($columns = ['*'])
*/
class KeywordRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'word'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Keyword::class;
    }

    
}
