<?php

namespace App\Criteria\Admin;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Input;
use Date;

/**
 * Class BlockCriteria
 * @package namespace App\Criteria\Admin;
 */
class BlockCriteria implements CriteriaInterface
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

            $query->where('type', '=', 'BLOCK');

            if (!empty($search['title'])) {
                $query->where('title', 'LIKE', '%' . $search['title'] . '%');
            }
            if (!empty($search['created_at'])) {
                list($from, $to) = explode(' - ',$search['created_at']);
                $query->whereRaw('DATE(created_at) BETWEEN ? AND ?', [new Date($from), new Date($to)]);
            }
        });

        return $m;
    }
}

