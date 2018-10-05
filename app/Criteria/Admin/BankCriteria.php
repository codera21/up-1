<?php

namespace App\Criteria\Admin;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Input;
use Date;

/**
 * Class BankCriteria
 * @package namespace App\Criteria\Admin;
 */
class BankCriteria implements CriteriaInterface
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

            if (!empty($search['bank_name'])) {
                $query->where('bank_name', 'LIKE', '%' . $search['bank_name'] . '%');
            }

            if (!empty($search['account_title'])) {
                $query->where('account_title', 'LIKE', '%' . $search['account_title'] . '%');
            }
            
            if (!empty($search['account_no'])) {
                $query->where('account_no', 'LIKE', '%' . $search['account_no'] . '%');
            }
        });

        return $m;
    }
}

