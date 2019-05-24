<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdjuntoController extends Controller
{
    public function downloadFile ($file){
        $pathToFile = public_path().'../files'.$file;
        return response()->download($pathToFile);
    }
}
