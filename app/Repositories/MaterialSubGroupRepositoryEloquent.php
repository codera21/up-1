<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MaterialSubGroupRepository;
use App\Models\MaterialSubGroup;

/**
 * Class MaterialGroupRepositoryEloquent
 * @package namespace App\Repositories;
 */
class MaterialSubGroupRepositoryEloquent extends BaseRepository implements MaterialSubGroupRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MaterialSubGroup::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
