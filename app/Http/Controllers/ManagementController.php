<?php

namespace Onlinecorrection\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Onlinecorrection\Http\Requests;
use Onlinecorrection\Models\Document;
use Onlinecorrection\Models\Order;
use Onlinecorrection\Repositories\OrderRepository;
use Onlinecorrection\Services\ManagementService;
use Onlinecorrection\Http\Requests\ManagementDocumentRequest;


class ManagementController extends Controller
{


    /**
     * @var Document
     */
    private $document;
    /**
     * @var ManagementService
     */
    private $managementService;
    /**
     * @var OrderRepository
     */
    private $orderRepository;
    /**
     * @var Order
     */
    private $order;

    public function __construct(Document $document,
                                ManagementService $managementService,
                                OrderRepository $orderRepository,Order $order)
    {


        $this->document = $document;
        $this->managementService = $managementService;
        $this->orderRepository = $orderRepository;
        $this->order = $order;
    }
    public function index()
    {

        $documents = $this->document->status(6)->get();

        return view('management.index', compact('documents'));

    }


    public function create($id)
    {

        $document = $this->managementService->coachtrack($id);

        return view('management.create', compact('document'));
    }

    public function store(ManagementDocumentRequest $request)
    {

        $data = $request->all();

        \DB::beginTransaction();
        try {
            $data['evaluation'] = $this->managementService->evaluation($data);
            $this->orderRepository->create($data);
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            throw $e;
        }

        Session::put('success', 'Corrigida com sucesso');
        return redirect()->route('management.index');
    }

    public function listing()
    {

        $documents = $this->document->status(20000)->get();
        return view('management.listing', compact('documents'));

    }

    public function status($id)
    {
        $user = $this->document->find($id);
        $user->status = 1;
        $user->save();

        Session::put('success', 'Enviada para nova correção');
        return redirect()->route('management.listing');

    }

    public function statuszero($id)
    {
        $user = $this->document->find($id);
        $user->status = 0;
        $user->save();

        Session::put('success', 'Enviada para dupla correção');
        return redirect()->route('management.listing');

    }
    public function work()
    {
        $orders = $this->order->clientid()->get();
        return view('management.work', compact('orders'));

    }

}
