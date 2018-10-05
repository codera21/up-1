<?php

namespace App\Criteria\Admin;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Input;
use Date;

class GoalCriteria implements CriteriaInterface
{
    public function apply($model, RepositoryInterface $repository)
    {
        $search = Input::get('search');
        $m = $model->where(function($query) use($search) {

            if (!empty($search['goal_question'])) {
                $query->where('goal_question', 'LIKE', '%' . $search['goal_question'] . '%');
            }
        });

        return $m;
    }
}
