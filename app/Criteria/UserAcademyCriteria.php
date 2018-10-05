<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Auth;
use Input;
use Date;
/**
 * Class UserAcademyCriteria
 * @package namespace App\Criteria;
 */
class UserAcademyCriteria implements CriteriaInterface
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
        $m = $model->with('materialGroup');
        $m = $m->with('materialSubGroup');
        $m = $m->with('material');
        
        if (!empty($search['material_group']) and $search['material_group'] > 0) {
            $m->whereHas('materialGroup', function ($query) use($search) {
                    $query->where('material_group.id', $search['material_group']);
            });
        }

        if (!empty($search['material_sub_group']) and $search['material_sub_group'] > 0) {
            $m->whereHas('materialSubGroup', function ($query) use($search) {
                    $query->where('material_sub_group.id', $search['material_sub_group']);
            });
        }

        if (!empty($search['material_type'])) {
            $m->whereHas('material', function ($query) use($search) {
                    $query->where('material.material_type', $search['material_type']);
            });
        }

        if (!empty($search['title'])) {
            $m->whereHas('material', function ($query) use($search) {
                    $query->where('material.title', $search['title']);
            });
        }        

        // Payment Status must be Approved
        $m->whereHas('payments', function ($query) use($search) {
            $query->where('payments.status', 'APPROVED');
        });

        $m = $m->where(function($query) use($search) {
            
            $query->where('user_id', '=', Auth::user()->id);
            $query->where('subscription_fee', 'NO');

            $query->where(function($q){
                $q->whereNull('end_date');
                $q->orWhere('end_date', '>=', Date::now());
            });
            
            
        });
        //dd($m->toSql());
        return $m;
    }
}
