<?php
/**
 * Created by PhpStorm.
 * User: diogoazevedo
 * Date: 03/11/15
 * Time: 00:03
 */

namespace Onlinecorrection\Services;


use Onlinecorrection\Models\Order;
use Onlinecorrection\Repositories\OrderRepository;

class OrderService
{

    /**
     * @var OrderRepository
     */
    private $orderRepository;

    /**
     * @var Order
     */
    private $order;

    public function __construct(OrderRepository $orderRepository, Order $order)
    {

        $this->orderRepository = $orderRepository;
        $this->order = $order;
    }

}