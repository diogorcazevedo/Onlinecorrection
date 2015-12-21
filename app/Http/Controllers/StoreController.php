<?php

namespace Onlinecorrection\Http\Controllers;


use Illuminate\Support\Facades\Session;
use Onlinecorrection\Models\Project;
use Onlinecorrection\Http\Requests;
use Onlinecorrection\Models\Document;
use Onlinecorrection\Repositories\DocumentRepository;
use Onlinecorrection\Repositories\OrderRepository;
use Onlinecorrection\Repositories\PackageRepository;
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
    /**
     * @var PackageRepository
     */
    private $packageRepository;


    public function __construct(Project $project,
                                Document $document,
                                DocumentRepository $documentRepository,
                                StoreService $storeService,
                                OrderRepository $orderRepository,
                                DocImgService $docImgService,
                                PackageRepository $packageRepository)


    {


        $this->project = $project;
        $this->document = $document;
        $this->documentRepository = $documentRepository;
        $this->storeService = $storeService;
        $this->orderRepository = $orderRepository;
        $this->docImgService = $docImgService;
        $this->packageRepository = $packageRepository;

        ini_set('memory_limit', '-1');
        set_time_limit(90000000000000000);  //alocando memória e verificando permissao
        //===========================================================================//
        //===========================================================================//
    }

    public function index()
    {
        $packages = $this->packageRepository->findWhere([
                                               'user_id'=>auth()->user()->id,
                                               ['qtd','!=','0']])
                                            ->all();
      /*  if(empty($packages)):
            $packages = $this->packageRepository->findWhere([
                                                    'user_second'=>auth()->user()->id,
                                                    ['qtd','!=','0']])
                                                ->all();
        endif;
      */
        if(empty($packages)):
            Session::put('success', 'Entre em contato com o administrador para adicionar novo pacote de provas');
        endif;
        return view('store.index', compact('packages'));

    }

    public function doclist($id)
    {
        $documents = $this->documentRepository->findWhere(['package_id'=>$id])->all();
        if(empty($documents)):
            Session::put('success', 'Entre em contato com o administrador para adicionar novo pacote de provas');
            return redirect()->route('store.index');
        endif;
        return view('store.doclist', compact('documents'));

    }
    public function create($id)
    {
        $document = $this->documentRepository->find($id);
        return view('store.create', compact('document'));
    }

    public function store(StoreDocumentRequest $request)
    {
        $data = $request->all();

        if(!empty($data['zero'])):
            \DB::beginTransaction();
            try {
            $data['checked'] = 1;
            $this->orderRepository->create($data);
            $document = $this->documentRepository->find($data['document_id']);
            $pack = $this->packageRepository->find($document->package_id);
            $pack->qtd = $pack->qtd -1;
            $pack->save();
            $document->status = 5;
            $document->save();
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
                $document = $this->documentRepository->find($data['document_id']);
                $pack = $this->packageRepository->find($document->package_id);
                $pack->qtd = $pack->qtd -1;
                $pack->save();
                $document->status = $document->status + 1;
                $document->save();
            \DB::commit();
            } catch (\Exception $e) {
            \DB::rollback();
                throw $e;
            }
        endif;
        Session::put('success', 'Corrigida com sucesso');
        return redirect()->route('store.doclist',$pack->id);
    }

    public function edit($id)
    {

        $orders = $this->orderRepository->findByField('user_id', $id)->all();

        return view('store.edit', compact('orders'));
    }

}
