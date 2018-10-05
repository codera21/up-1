<?php

namespace App\Criteria;

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
        $m = $model->where(function($query) use($search) {
            
            $query->where('receiver_id', '=', Auth::user()->id);

            if (!empty($search['commission_amount'])) {
                $query->where('commission_amount', $search['commission_amount']);
            }
            

            if (!empty($search['created_at'])) {
                list($from, $to) = explode(' - ',$search['created_at']);
                $query->whereRaw('DATE(created_at) BETWEEN ? AND ?', [new Date($from), new Date($to)]);
            }
            
        });
        
        return $m;
    }
}
