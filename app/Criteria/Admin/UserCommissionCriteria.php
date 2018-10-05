<?php

namespace App\Criteria\Admin;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Auth;
use Input;
use Date;

/**
 * Class UserCommissionCriteria
 * @package namespace App\Criteria;
 */
class UserCommissionCriteria implements CriteriaInterface
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

        $m = $model->with('user');

        if (!empty($search['subscriber_name'])) {
                
                $m->whereHas('user', function ($query) use($search) {
                    $query->where('first_name', 'like', '%'. $search['subscriber_name']. '%');
                });

        }

        $m->where(function($query) use($search) {

            if (!empty($search['commission_amount'])) {
                $query->where('commission_amount', $search['commission_amount']);
            }
            

            if (!empty($search['created_at'])) {
                list($from, $to) = explode(' - ',$search['created_at']);
                $query->whereRaw('DATE(created_at) BETWEEN ? AND ?', [new Date($from), new Date($to)]);
            }

            if (!empty($search['transaction_type'])) {
                $query->where('transaction_type', $search['transaction_type']);
            }
            
            
        });
        
        //dd($m->toSql());
        return $m;
    }
}
