<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tramite;

class TramiteController extends Controller
{
    /**
     * Crea un nuevo tramite.
     *
     * @param array $request
     * @return App\Tramite $tramite
     */
    public function create(Request $request){
        $tramite = new Tramite();
        return $tramite->createTramite($request);
    }

    /**
     * Actualiza un tramite.
     *
     * @param array $request
     * @return App\Tramite $tramite
     */
    public function update(Request $request){
        $tramite = new Tramite();
        return $tramite->findById($id)->update(array($request));
    }

    /**
     * Borra un tramite.
     *
     * @param integer $id
     * @return boolean $borrado
     */
    public function delete($id) {
        $tramite = new Tramite();
        return $tramite->findById($id)->delete();
    }

    /**
     * Devuelve todos los tramites.
     *
     * @param array $request
     * @return collection $tramites
     */
    public function all(Request $request) {
        $tramite = new Tramite();
        return response()->json(['tramites' => $tramite->findAll()]);
    }

    /**
     * Devuelve un tramite dado un id.
     *
     * @param integer $id
     * @return App\Tramite $tramite
     */
    public function getTramite($id) {
        $tramite = new Tramite();
        return $tramite->findById($id);
    }
}
