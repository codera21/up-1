<?php

namespace App\Criteria\Admin;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Input;
use Date;

/**
 * Class BannerCriteria
 * @package namespace App\Criteria\Admin;
 */
class BannerCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $search = Input::get('search');
        $m = $model->where(function($query) use($search) {

            if (!empty($search['page'])) {
                $query->where('page', 'LIKE', '%' . $search['page'] . '%');
            }

            if (!empty($search['title'])) {
                $query->where('title', 'LIKE', '%' . $search['title'] . '%');
            }
        });

        return $m;
    }
}

