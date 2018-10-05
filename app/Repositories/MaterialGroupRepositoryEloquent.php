<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MaterialGroupRepository;
use App\Models\MaterialGroup;

/**
 * Class MaterialGroupRepositoryEloquent
 * @package namespace App\Repositories;
 */
class MaterialGroupRepositoryEloquent extends BaseRepository implements MaterialGroupRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MaterialGroup::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
