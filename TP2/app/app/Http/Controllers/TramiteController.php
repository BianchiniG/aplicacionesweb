<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TramiteController extends Controller
{
    public function create(Request $request){
        return Tramite::create($request);
    }

    public function update(Request $request){
        return [];
    }
}
