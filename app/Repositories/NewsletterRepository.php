<?php

namespace App\Repositories;

use App\Models\Newsletter;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NewsletterRepository
 * @package App\Repositories
 * @version May 1, 2018, 10:04 pm UTC
 *
 * @method Newsletter findWithoutFail($id, $columns = ['*'])
 * @method Newsletter find($id, $columns = ['*'])
 * @method Newsletter first($columns = ['*'])
*/
class NewsletterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'surname',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Newsletter::class;
    }
}
