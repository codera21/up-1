<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserCommentRepository;
use App\Models\UserComment;
use App\Validators\UserCommentValidator;

/**
 * Class UserCommentRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UserCommentRepositoryEloquent extends BaseRepository implements UserCommentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserComment::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
