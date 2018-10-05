<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\GoalRepository;
use App\Models\UserGoal;
use App\Validators\UserGoalValidator;

/**
 * Class UserGoalRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UserGoalRepositoryEloquent extends BaseRepository implements UserGoalRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserGoal::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
