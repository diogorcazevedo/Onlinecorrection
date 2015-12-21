<?php

namespace Onlinecorrection\Http\Controllers;


use Illuminate\Support\Facades\Session;
use Onlinecorrection\Models\Package;
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


class PackagesController extends Controller
{


    /**
     * @var DocumentRepository
     */
    private $documentRepository;

    /**
     * @var OrderRepository
     */
    private $orderRepository;
    /**
     * @var DocImgService
     */
    private $docImgService;
    /**
     * @var Package
     */
    private $package;
    /**
     * @var PackageRepository
     */
    private $packageRepository;


    public function __construct(
                                DocumentRepository $documentRepository,
                                OrderRepository $orderRepository,
                                DocImgService $docImgService, Package $package,
                                PackageRepository $packageRepository)
    {

        $this->documentRepository = $documentRepository;
        $this->orderRepository = $orderRepository;
        $this->docImgService = $docImgService;
        $this->package = $package;
        $this->packageRepository = $packageRepository;
    }



    //==========================================================================================


    //
    //
    //  Pacote client

    public function index()
    {

        $packages = $this->packageRepository->paginate(10);

        return view('package.index', compact('packages'));

    }

    public function create($id)
    {

        $package = $this->packageRepository->find($id);

        $package->user_id = auth()->user()->id;
        $package->save();

        foreach($package->document as $document):
            echo $document->id;
            die();
            endforeach;

        return view('package.index', compact('packages'));

    }


    public function second($id)
    {

        $package = $this->packageRepository->find($id);

        $package->user_second = auth()->user()->id;
        $package->assigned = 1;
        $package->save();

        foreach($package->document as $document):
            echo $document->id;
            die();
        endforeach;

        return view('package.index', compact('packages'));

    }


    public function package()
    {

        $package1 = $this->documentRepository->findWhere(['project_id'=>'5','project_id'=>'5'])->all();


        return view('store.package', compact('documents'));

    }


    //==========================================================================================



    //
    //
    //  Pacote Adminstrador



    public function packall()
    {
        $packages = $this->packageRepository->paginate(10);

        return view('package.packall', compact('packages'));

    }


    public function docsall($id)
    {

        $documents = $this->documentRepository->findByField('package_id', $id)->all();


        return view('package.docsall', compact('documents'));

    }

    //==========================================================================================


    //
    //
    //  Pacote Master

    public function upload()
    {

        $dados = $this->docImgService->doclist();

        //UPLOAD DE IMAGENS
        $documents = $this->documentRepository->findWhereIn('id_inscricao', $dados);
        $feedback = $this->docImgService->refreshproject($documents);
        echo $feedback;


        // return view('store.index', compact('documents'));

    }

}
