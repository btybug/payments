<?php
namespace BtyBugHook\Payments\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use BtyBugHook\Payments\Models\Orders;

class OrdersRepository extends GeneralRepository
{
    /**
     * @return mixed
     */

    public function model()
    {
        return new Orders();
    }
}