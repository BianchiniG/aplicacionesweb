<?php

namespace App\Http\Controllers;

use App\Tramite;

use Illuminate\Http\Request;

class AdjuntoController extends Controller
{
    /**
     * Descarga el archivo adjunto.
     * 
     * @param integer $id_tramite
     * @param string $file
     * @return Response
     */
    public function downloadFile($id_tramite, $file){
        $tramite = new Tramite();
        $tramite = $tramite->findById($id_tramite);
        return response()->download($tramite->getFilePath($file));
    }
}
