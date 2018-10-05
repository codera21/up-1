<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PaymentDetailsRepository;
use App\Models\PaymentDetails;

/**
 * Class PaymentDetailsRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PaymentDetailsRepositoryEloquent extends BaseRepository implements PaymentDetailsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PaymentDetails::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
