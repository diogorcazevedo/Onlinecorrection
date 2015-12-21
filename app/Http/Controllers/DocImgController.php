<?php

namespace Onlinecorrection\Http\Controllers;




use Onlinecorrection\Services\DocImgService;

class DocImgController extends Controller
{


    /**
     * @var DocImgService
     */
    private $docImgService;

    public function __construct(DocImgService $docImgService)
    {


        $this->docImgService = $docImgService;
    }
    public function index()
    {

      $dados = $this->docImgService->doclist();

        shuffle($dados);
        foreach ($dados as $value) {
            if(!empty($value)):
                echo $value;
                echo '<br/>';
            endif;
        }


    }

}
