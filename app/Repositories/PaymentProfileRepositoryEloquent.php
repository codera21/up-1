<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PaymentProfileRepository;
use App\Models\PaymentProfile;

/**
 * Class PaymentProfileRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PaymentProfileRepositoryEloquent extends BaseRepository implements PaymentProfileRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PaymentProfile::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
