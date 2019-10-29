<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CodeRepository;
use App\Models\Code;
use App\Validators\CodeValidator;

/**
 * Class CodeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CodeRepositoryEloquent extends BaseRepository implements CodeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Code::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
