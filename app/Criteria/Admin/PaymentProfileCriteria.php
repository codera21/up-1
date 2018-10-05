<?php

namespace App\Criteria\Admin;

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
        $m = $model->with('user');

        if (!empty($search['fname'])) {
            $m->whereHas('user', function ($query) use($search) {
                    $query->where('users.first_name', 'like', '%'.$search['fname'].'%');
            });
        }
        if (!empty($search['lname'])) {
            $m->whereHas('user', function ($query) use($search) {
                    $query->orWhere('users.last_name', 'like', '%'.$search['lname'].'%');
            });
        }

        $m = $model->where(function($query) use($search) {
            $query->where('deleted', '=', 'NO');

            if (!empty($search['payment_type'])) {
                $query->where('payment_type', $search['payment_type']);
            }
            
        });
        
        return $m;
    }
}
