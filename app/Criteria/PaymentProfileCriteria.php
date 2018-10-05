<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Auth;
use Input;

/**
 * Class PaymentProfileCriteria
 * @package namespace App\Criteria;
 */
class PaymentProfileCriteria implements CriteriaInterface
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
            
            $query->where('user_id', '=', Auth::user()->id);
            $query->where('deleted', '=', 'NO');
            
        });
        
        return $m;
    }
}
