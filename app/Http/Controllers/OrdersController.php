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
use Onlinecorrection\Repositories\UserRepository;
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
    /**
     * @var UserRepository
     */
    private $userRepository;


    public function __construct(OrderRepository $repository,
                                DocumentRepository $documentRepository,
                                OrderService $orderService,
                                Document $document,
                                Order $order,
                                UserRepository $userRepository)
    {

        $this->repository = $repository;
        $this->documentRepository = $documentRepository;
        $this->orderService = $orderService;
        $this->document = $document;
        $this->order = $order;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $orders = $this->order->orderBy('document_id', 'asc')->paginate();
       // $orders->setPath('orders');

        return view('admin.orders.index',compact('orders'));

    }

    public function teacher()
    {
        $users = $this->userRepository->paginate();
       // $users->setPath('orders');

        return view('admin.orders.teacher',compact('users'));

    }

    public function visure($id)
    {

        $orders = $this->repository->findByField('user_id',$id)->all();
        return view('admin.orders.visure',compact('orders'));
    }


    public function qtd()
    {
        $counts = $this->document->where('upload', '=', 1)->count();
        $orders = $this->order->count();
        $zeros = $this->order->where('checked', '=', 1)->count();
        $discrepancy = $this->document->where('discrepancy', '=', 1)->count();
        $manager = $this->document->where('manager', '=', 1)->count();
        $managers = $this->order->where('manager', '=', 1)->count();


        return view('admin.orders.qtd',compact('counts','orders','zeros','discrepancy','manager','managers'));

    }

    public function average()
    {

        $documents = $this->documentRepository->findByField('status',3)->all();
        return view('admin.orders.average',compact('documents'));
    }



// não Aplicável
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
}