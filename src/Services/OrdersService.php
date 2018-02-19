<?php
namespace BtyBugHook\Payments\Services;

use BtyBugHook\Payments\Repository\OrdersRepository;

class OrdersService{
    private $ordersRepository;

    public function __construct(OrdersRepository $ordersRepository)
    {
        $this->ordersRepository = $ordersRepository;
    }

    public function getOrdersByAuth()
    {
        return $this->ordersRepository->getBy('user_id',\Auth::id());
    }
}