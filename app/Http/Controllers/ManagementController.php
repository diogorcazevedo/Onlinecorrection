<?php

namespace Onlinecorrection\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Onlinecorrection\Http\Requests;
use Onlinecorrection\Models\Document;
use Onlinecorrection\Models\Order;
use Onlinecorrection\Repositories\DocumentRepository;
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
    /**
     * @var DocumentRepository
     */
    private $documentRepository;

    public function __construct(Document $document,
                                ManagementService $managementService,
                                OrderRepository $orderRepository,
                                Order $order,
                                DocumentRepository $documentRepository)
    {


        $this->document = $document;
        $this->managementService = $managementService;
        $this->orderRepository = $orderRepository;
        $this->order = $order;
        $this->documentRepository = $documentRepository;

        ini_set('memory_limit', '-1');
        set_time_limit(90000000000000000);  //alocando memória e verificando permissao
        //===========================================================================//
        //===========================================================================//

    }



    //Trabalhos do supervisor/supervisores

    public function work()
    {
        $orders = $this->order->userid()->get();
        return view('management.work', compact('orders'));

    }

    public function workall()
    {
        $orders = $this->orderRepository->findWhereIn('user_id', [3, 5, 6, 15, 18]);
        return view('management.workall', compact('orders'));

    }










    //zero
    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    public function zero()
    {

        $orders = $this->orderRepository->findWhere([
            'checked'=>'1',
            'manager'=>'0',
        ]);

        return view('management.zero', compact('orders'));

    }


    public function zerolist($id)
    {
        $orders = $this->orderRepository->findByField('document_id', $id);
        $count = count($orders);

        if ($count == 1):
            Session::put('success', 'Ainda não existe segunda correção para este documento');
            return redirect()->route('management.zero');
        endif;
        return view('management.zerolist', compact('orders'));

    }




    //correção ZERO
    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


    public function create($id)
    {

        $document = $this->documentRepository->find($id);

        return view('management.create', compact('document'));
    }

    public function store(ManagementDocumentRequest $request)
    {

        $data = $request->all();

        if (!empty($data['zero'])):
            \DB::beginTransaction();
            try {
                $this->orderRepository->create($data);
                $orders = $this->orderRepository->findByField('document_id', $data['document_id'])->all();
                foreach ($orders as $order):
                    $order->manager = 1;
                    $order->save();
                endforeach;
                $document = $this->documentRepository->find($data['document_id']);
                $document->manager = 1;
                $document->manager_evaluation = 5555;
                $document->save();
                \DB::commit();
            } catch (\Exception $e) {
                \DB::rollback();
                throw $e;
            }
        else:
            \DB::beginTransaction();
            try {
                $data['evaluation'] = $this->managementService->evaluation($data);
                $this->orderRepository->create($data);
                $orders = $this->orderRepository->findByField('document_id', $data['document_id'])->all();
                foreach ($orders as $order):
                    $order->manager = 1;
                    $order->save();
                endforeach;
                $document = $this->documentRepository->find($data['document_id']);
                $document->manager = 1;
                $document->manager_evaluation = $data['evaluation'];
                $document->save();
                \DB::commit();
            } catch (\Exception $e) {
                \DB::rollback();
                throw $e;
            }
        endif;

        Session::put('success', 'Corrigida com sucesso');
        return redirect()->route('management.zero');
    }

}
