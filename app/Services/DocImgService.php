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
        $path = "../public/redacoes/sexto";
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
        $contador = 1;
        foreach ($documents as $document):
            $document->package_id = $contador;
            $document->project_id = 2;
            $upload = $document->upload;
            $document->upload = $upload + 1;
            $document->save();
            $contador++;
            if ($contador == 50):
                $contador = 1;
            endif;
        endforeach;
        $feedback = 'Projeto 2 Importado com sucesso';
        return $feedback;

    }

}