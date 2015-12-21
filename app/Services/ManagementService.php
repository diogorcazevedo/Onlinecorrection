<?php
/**
 * Created by PhpStorm.
 * User: diogoazevedo
 * Date: 03/11/15
 * Time: 00:03
 */

namespace Onlinecorrection\Services;

use Onlinecorrection\Models\Document;
use Onlinecorrection\Models\Order;
use Onlinecorrection\Repositories\DocumentRepository;
use Onlinecorrection\Repositories\OrderRepository;

class ManagementService
{
    /**
     * @var Document
     */
    private $document;

    /**
     * @var OrderRepository
     */
    private $orderRepository;


    private $contador;
    /**
     * @var Order
     */
    private $order;
    /**
     * @var DocumentRepository
     */
    private $documentRepository;

    public function __construct(Document $document,
                                Order $order,
                                DocumentRepository $documentRepository,
                                OrderRepository $orderRepository)
    {


        $this->document = $document;
        $this->orderRepository = $orderRepository;
        $this->order = $order;
        $this->documentRepository = $documentRepository;
    }



    public function evaluation($data)
    {

        $evaluation = $data['tipo'] + $data['tema'] + $data['coesao'] + $data['coerencia'] + $data['gramatica'];
        return $evaluation;

    }

}