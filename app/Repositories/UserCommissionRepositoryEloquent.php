<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserCommissionRepository;
use App\Models\UserCommission;

/**
 * Class UserCommissionRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UserCommissionRepositoryEloquent extends BaseRepository implements UserCommissionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserCommission::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
