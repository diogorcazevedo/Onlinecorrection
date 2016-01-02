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


class DiscrepancyController extends Controller
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


    public function listing()
    {
        $documents = $this->documentRepository->findWhere([
            'discrepancy' => '1',
            'manager' => '0',
        ]);

        return view('discrepancy.listing', compact('documents'));

    }

    public function refresh()
    {


        $documents = $this->documentRepository->findWhere([['upload','>',1]])->all();

        foreach ($documents as $document):
            $orders = $this->orderRepository->findByField('document_id', $document->id)->all();
            if (!empty($orders)):
                if (count($orders) != 1):
                    foreach ($orders as $order):
                        $avaliacao[] = $order->evaluation;
                    endforeach;
                    $notaum = $avaliacao[0];
                    $notadois = $avaliacao[1];

                    //salvando a média
                    $partialevaluation = $notaum + $notadois;
                    $finalevaluation = $partialevaluation / 2;

                    $document->final_evaluation = $finalevaluation;
                    $document->save();

                    //verificando se existe discrepancia
                    $notasomada = $notadois - $notaum;
                    $soma = abs($notasomada);

                    if ($soma > 2.5):
                        $document->discrepancy = 1;
                        $document->save();
                        echo '<br/>'. $document->id. '- save <br/>';
                    else:
                        echo '<br/>'. $document->id. '- not save <br/>';
                    endif;
                    unset($avaliacao);
                endif;
            endif;
        endforeach;

        return redirect()->route('discrepancy.listing');
    }


//correção


    public function create($id)
    {

        $document = $this->documentRepository->find($id);

        return view('discrepancy.create', compact('document'));
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
        return redirect()->route('discrepancy.listing');
    }

}
