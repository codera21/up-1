<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\LevelRepository;
use App\Models\Level;

/**
 * Class LevelRepositoryEloquent
 * @package namespace App\Repositories;
 */
class LevelRepositoryEloquent extends BaseRepository implements LevelRepository
{
   
    /*protected $model;

    public function __construct(Level $model)
    {
        $this->model = $model;
    }*/



    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Level::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


    /*public function get($recordNumber = 0)
    {
        
        
    return $this->model->get($recordNumber);
    }*/
}
