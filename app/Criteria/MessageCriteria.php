<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Auth;
use Input;

/**
 * Class MessageCriteria
 * @package namespace App\Criteria;
 */
class MessageCriteria implements CriteriaInterface
{

    /**
     * @string inboxTYpe
     */
    protected $inboxType;

    public function __construct($inboxType)
    {
        $this->inboxType = $inboxType;
    }

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
        $inboxType = $this->inboxType;
        $user = Auth::user();
        $m = $model->where(function($query) use($search, $inboxType, $user) {
            
            /*$query->where('from_user_id', '=', Auth::user()->id);*/

            if($inboxType == 'inbox'){
                $query->where('deleted', '=', 'NO');
                $query->where('to_user_id', '=', $user->id);
            }elseif($inboxType == 'unread'){
                $query->where('readed', '=', 'NO');
                $query->where('to_user_id', '=', $user->id);
            }elseif($inboxType == 'sent'){
                $query->where('from_user_id', '=', $user->id);
            }elseif($inboxType == 'trash'){
                $query->where('deleted', '=', 'YES');
                $query->where('to_user_id', '=', $user->id);
            }
        });
        return $m;
    }
}
