<?php
/**
 * Created by PhpStorm.
 * User: diogoazevedo
 * Date: 05/11/15
 * Time: 23:51
 */

namespace Onlinecorrection\Http\Controllers;


use Onlinecorrection\Models\Document;
use Onlinecorrection\Models\Order;
use Onlinecorrection\Repositories\ClientRepository;
use Onlinecorrection\Repositories\DocumentRepository;
use Onlinecorrection\Repositories\OrderRepository;
use Onlinecorrection\Services\OrderService;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    /**
     * @var OrderRepository
     */
    private $repository;

    /**
     * @var DocumentRepository
     */
    private $documentRepository;
    /**
     * @var ClientRepository
     */
    private $clientRepository;
    /**
     * @var OrderService
     */
    private $orderService;
    /**
     * @var Document
     */
    private $document;
    /**
     * @var Order
     */
    private $order;


    public function __construct(OrderRepository $repository,
                                DocumentRepository $documentRepository,
                                ClientRepository $clientRepository,
                                OrderService $orderService,
                                Document $document,
                                Order $order)
    {

        $this->repository = $repository;
        $this->documentRepository = $documentRepository;
        $this->clientRepository = $clientRepository;
        $this->orderService = $orderService;
        $this->document = $document;
        $this->order = $order;
    }

    public function index()
    {
        $orders = $this->order->orderBy('document_id', 'asc')->paginate();
        $orders->setPath('orders');

        return view('admin.orders.index',compact('orders'));

    }

    public function teacher()
    {
        $clients = $this->clientRepository->paginate();
        $clients->setPath('orders');

        return view('admin.orders.teacher',compact('clients'));

    }

    public function visure($id)
    {

        $orders = $this->repository->findByField('client_id',$id)->all();
        return view('admin.orders.visure',compact('orders'));
    }

    public function coach()
    {
        $orders = $this->repository->paginate();
        $orders->setPath('orders');

        return view('admin.orders.index',compact('orders'));

    }

    public function edit($id)
    {
       // $list_status =$this->orderService->state();
        $order = $this->repository->find($id);
        $deliveryman = $this->userRepository->getdeliveryman();

        return view('admin/orders/edit',compact('order','list_status','deliveryman'));

    }

    public function update(Request $request, $id)
    {
        $all = $request->all();
        $this->repository->update($all,$id);

        return redirect()->route('admin.orders.index');
    }


    public function qtd()
    {
        $count = $this->document->count();
        $stszero = $this->document->where('status', '=', 0)->count();
        $stsum = $this->document->where('status', '=', 1)->count();
       // $ststwo = $this->document->where('status', '=', 2)->count();
        $ststree = $this->document->where('status', '=', 3)->count();
        $stsfour = $this->document->where('status', '=', 4)->count();
        $stsfive = $this->document->where('status', '=', 5)->count();




        return view('admin.orders.qtd',compact('count','stszero','stsum','ststree','ststree','stsfour','stsfive'));

    }

    public function average()
    {

        $documents = $this->documentRepository->findByField('status',3)->all();
        return view('admin.orders.average',compact('documents'));
    }
}