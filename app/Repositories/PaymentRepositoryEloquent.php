<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PaymentRepository;
use App\Models\Payment;

/**
 * Class OfflinePaymentRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PaymentRepositoryEloquent extends BaseRepository implements PaymentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Payment::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
