<?php

namespace Onlinecorrection\Http\Controllers;


use Onlinecorrection\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Onlinecorrection\Repositories\DocumentImageRepository;
use Onlinecorrection\Repositories\DocumentRepository;
use Onlinecorrection\Models\DocumentImage;
use Onlinecorrection\Http\Requests\AdminDocumentRequest;
use Onlinecorrection\Http\Requests\DocumentImageRequest;



class DocumentImageController extends Controller
{


    /**
     * @var DocumentRepository
     */
    private $documentRepository;

    public function __construct(DocumentRepository $documentRepository)
    {


        $this->documentRepository = $documentRepository;
    }

    public function index($id)
    {

        $document = $this->documentRepository->find($id);

        return view('admin.images.index', compact('document'));
    }

    public function createImage($id)
    {

        $document = $this->documentRepository->find($id);

        return view('admin.images.create_image', compact('document'));
    }


    public function storeImage(DocumentImageRequest $request, $id, DocumentImage $documentImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $documentImage::create(['document_id' => $id, 'extension' => $extension]);

        Storage::disk('public_local')->put($image->id . '.' . $extension, File::get($file));

        return redirect()->route('admin.images.index', ['id' => $id]);
    }

    public function destroyImage(DocumentImage $documentImage, $id)
    {

        $image = $documentImage->find($id);

        if(file_exists(public_path().'/uploads/'.$image->id . '.' . $image->extension)){
            Storage::disk('public_local')->delete($image->id . '.' . $image->extension);
        }

        $product = $image->document;
        $image->delete();

        return redirect()->route('admin.images.index', ['id' => $product->id]);
    }
}
