<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\StateRepository;
use App\Models\State;
use App\Validators\StateValidator;

/**
 * Class StateRepositoryEloquent
 * @package namespace App\Repositories;
 */
class StateRepositoryEloquent extends BaseRepository implements StateRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return State::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
