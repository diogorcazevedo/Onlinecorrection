<?php

namespace Onlinecorrection\Http\Controllers;


use Illuminate\Support\Facades\Session;
use Onlinecorrection\Models\Project;
use Onlinecorrection\Http\Requests;
use Onlinecorrection\Models\Document;
use Onlinecorrection\Repositories\DocumentRepository;
use Onlinecorrection\Repositories\OrderRepository;
use Onlinecorrection\Services\DocImgService;
use Onlinecorrection\Services\StoreService;
use Onlinecorrection\Http\Requests\StoreDocumentRequest;
use Symfony\Component\VarDumper\Caster\ExceptionCaster;


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
    /**
     * @var DocImgService
     */
    private $docImgService;


    public function __construct(Project $project,
                                Document $document,
                                DocumentRepository $documentRepository,
                                StoreService $storeService,
                                OrderRepository $orderRepository,
                                DocImgService $docImgService)
    {


        $this->project = $project;
        $this->document = $document;
        $this->documentRepository = $documentRepository;
        $this->storeService = $storeService;
        $this->orderRepository = $orderRepository;
        $this->docImgService = $docImgService;
    }

    public function index()
    {

        $dados = $this->docImgService->doclist();
        //$documents = $this->documentRepository->findWhereIn('id_inscricao', $dados)->random(10);

        $documents = $this->documentRepository->findWhereIn('id_inscricao', $dados);

       //UPLOAD DE IMAGENS
       // $documents = $this->documentRepository->findWhereIn('id_inscricao', $dados);
       // $this->docImgService->refreshproject($documents);


        return view('store.index', compact('documents'));

    }


    public function create($id)
    {
        $document = $this->documentRepository->find($id);
        return view('store.create', compact('document'));
    }

    public function store(StoreDocumentRequest $request)
    {
        $data = $request->all();

        $document= $this->storeService->tracking($data['document_id']);

        if(!empty($data['zero'])):
            $this->orderRepository->create($data);
            else:

        if ($document['status'] == 2):
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
       endif;
        Session::put('success', 'Corrigida com sucesso');
        return redirect()->route('store.index');
    }

    public function edit($id)
    {

        $orders = $this->orderRepository->findByField('user_id', $id)->all();

        return view('store.edit', compact('orders'));
    }

    public function package()
    {

        $package1 = $this->documentRepository->findWhere(['project_id'=>'5','project_id'=>'5'])->all();


        return view('store.package', compact('documents'));

    }

}
