<?php

namespace App\Criteria\Admin;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Input;
use Date;

/**
 * Class NewsCriteria
 * @package namespace App\Criteria\Admin;
 */
class UserCriteria implements CriteriaInterface
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

            if (!empty($search['id'])) {
                $query->where('id', '=', $search['id']);
            }
            if (!empty($search['first_name'])) {
                $query->where('first_name', 'LIKE', '%' . $search['first_name'] . '%');
            }
            if (!empty($search['last_name'])) {
                $query->where('last_name', 'LIKE', '%' . $search['last_name'] . '%');
            }
            if (!empty($search['email'])) {
                $query->where('email', '=', $search['email']);
            }
        });

        return $m;
    }
}
