<?php
/**
 * Created by PhpStorm.
 * User: diogoazevedo
 * Date: 03/11/15
 * Time: 00:03
 */

namespace Onlinecorrection\Services;


class DocImgService
{

    public function __construct()
    {

    }


    public function doclist()
    {
        //$path = "../public/redacoes/redacaoMusica";
        $path = "../public/redacoes/imgPrimeiraSerie/imgUm";
        $diretorio = dir($path);
        // echo "Lista de Arquivos do diretório '<strong>" . $path . "</strong>':<br />";
        while ($arquivo = $diretorio->read()) {
            //  echo "<a href='" . $path . $arquivo . "'>" . $arquivo . "</a><br />";
            $pieces = explode(".", $arquivo);
            $dados[] = $pieces[0];
        }
        $diretorio->close();

        return array_filter($dados);


    }

    public function refreshproject($documents)
    {
        $contador = 115;
        foreach ($documents as $document):
            \DB::beginTransaction();
            try {
            $document->package_id = $contador;
            $document->project_id = 3;
            $upload = $document->upload;
            $document->upload = $upload + 200;
            $document->save();
            \DB::commit();
        } catch (\Exception $e) {
                \DB::rollback();
                throw $e;
            }
            $contador++;
            if ($contador == 116):
                $contador = 115;
            endif;
        endforeach;
        $feedback = 'Projeto 3 segunda parte Importado com sucesso';
        return $feedback;

    }

}