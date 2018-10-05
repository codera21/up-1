<?php

namespace App\Criteria\Admin;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Auth;
use Input;

/**
 * Class UserPaymentHistoryCriteria
 * @package namespace App\Criteria;
 */
class UserPaymentHistoryCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $search = Input::get('search');
        $m = $model->where(function($query) use($search) {

            if (!empty($search['user_id'])) {
                $query->where('user_id', $search['user_id']);
            }

            if (!empty($search['payment_mode'])) {
                $query->where('payment_mode', $search['payment_mode']);
            }

            if (!empty($search['payment_type'])) {
                $query->where('payment_type', $search['payment_type']);
            }

            if (!empty($search['paid_for'])) {
                $query->where('paid_for', $search['paid_for']);
            }

            if (!empty($search['created_at'])) {
                list($from, $to) = explode(' - ',$search['created_at']);
                $query->whereRaw('DATE(created_at) BETWEEN ? AND ?', [new Date($from), new Date($to)]);
            }
            
        });
        
        return $m;
    }
}
