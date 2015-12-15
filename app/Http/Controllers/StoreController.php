<?php

namespace Onlinecorrection\Http\Controllers;


use Illuminate\Support\Facades\Session;
use Onlinecorrection\Models\Project;
use Onlinecorrection\Http\Requests;
use Onlinecorrection\Models\Document;
use Onlinecorrection\Repositories\DocumentRepository;
use Onlinecorrection\Repositories\OrderRepository;
use Onlinecorrection\Services\StoreService;
use Onlinecorrection\Http\Requests\StoreDocumentRequest;


class StoreController extends Controller
{


    /**
     * @var Project
     */
    private $project;
    /**
     * @var Document
     */
    private $document;
    /**
     * @var DocumentRepository
     */
    private $documentRepository;
    /**
     * @var StoreService
     */
    private $storeService;
    /**
     * @var OrderRepository
     */
    private $orderRepository;


    public function __construct(Project $project,
                                Document $document,
                                DocumentRepository $documentRepository,
                                StoreService $storeService,
                                OrderRepository $orderRepository)
    {


        $this->project = $project;
        $this->document = $document;
        $this->documentRepository = $documentRepository;
        $this->storeService = $storeService;
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {

        $documents = $this->document->featured()->get();

        return view('store.index', compact('documents'));

    }


    public function create($id)
    {

        $document = $this->storeService->tracking($id);

        return view('store.create', compact('document'));
    }

    public function store(StoreDocumentRequest $request)
    {
        $data = $request->all();

        if ($data['status'] == 2):

            \DB::beginTransaction();
            try {
                $data['evaluation'] = $this->storeService->evaluation($data);
                $this->orderRepository->create($data);
                $this->storeService->care($data['document_id']);
            \DB::commit();
            } catch (\Exception $e) {
            \DB::rollback();
                throw $e;
            }
        else:
            \DB::beginTransaction();
            try {
                $data['evaluation'] = $this->storeService->evaluation($data);
                $this->orderRepository->create($data);
            \DB::commit();
            } catch (\Exception $e) {
            \DB::rollback();
                throw $e;
            }
        endif;
        Session::put('success', 'Corrigida com sucesso');
        return redirect()->route('store.index');
    }

    public function edit($id)
    {

        $orders = $this->orderRepository->findByField('client_id', $id)->all();


        return view('store.edit', compact('orders'));
    }

}
