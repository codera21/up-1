<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\FAQRepository;
use App\Models\FAQ;

/**
 * Class FAQRepositoryEloquent
 * @package namespace App\Repositories;
 */
class FAQRepositoryEloquent extends BaseRepository implements FAQRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FAQ::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
