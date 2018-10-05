<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\GoalRepository;
use App\Models\Goal;
use App\Validators\GoalValidator;

/**
 * Class GoalRepositoryEloquent
 * @package namespace App\Repositories;
 */
class GoalRepositoryEloquent extends BaseRepository implements GoalRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Goal::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
