<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PageRepository;
use App\Models\Page;
use App\Validators\PageValidator;

/**
 * Class PageRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PageRepositoryEloquent extends BaseRepository implements PageRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Page::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
