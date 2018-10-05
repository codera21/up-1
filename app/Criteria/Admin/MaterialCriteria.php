<?php

namespace App\Criteria\Admin;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Input;
use Date;

/**
 * Class MaterialGroupCriteria
 * @package namespace App\Criteria\Admin;
 */
class MaterialCriteria implements CriteriaInterface
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

        $m = $model->with('materialGroups');
        $m = $m->with('materialSubGroups');
        
        if (!empty($search['material_group']) and $search['material_group'] > 0) {
            $m->whereHas('materialGroups', function ($query) use($search) {
                    $query->where('material_group.id', $search['material_group']);
            });
        }

        if (!empty($search['material_sub_group']) and $search['material_sub_group'] > 0) {
            $m->whereHas('materialSubGroups', function ($query) use($search) {
                    $query->where('material_sub_group.id', $search['material_sub_group']);
            });
        }

        $m->where(function($query) use($search) {

            if (!empty($search['title'])) {
                $query->where('title', 'LIKE', '%' . $search['title'] . '%');
            }
        });

        if (!empty($search['material_type'])) {
            $query->where('material_type', $search['material_type']);
        }

        return $m;
    }
}
