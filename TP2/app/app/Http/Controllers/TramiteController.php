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
     * Actualiza los datos de un tramite.
     *
     * @param Request $request
     * @return App\Tramite $tramite
     */
    public function update(Request $request){
        $tramite = new Tramite();
        return $tramite->findById($request->id)->updateTramite(array($request->datos));
    }

    /**
     * Borra un tramite.
     *
     * @param integer $id
     * @return boolean $borrado
     */
    public function delete($id) {
        $tramite = new Tramite();
        return $tramite->findById($id)->removeTramite();
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

    /**
     * Devuelve la vista de creacion de tramites.
     *
     * @param Request $request
     * @return view
     */
    public function nuevoTramiteView(Request $request) {
        return view('admin.nuevo_tramite');
    }

    /**
     * Devuelve la vista de listado de tramites.
     *
     * @param Request $request
     * @return view
     */
    public function listaTramitesView(Request $request) {
        return view('admin.lista_tramites');
    }

    /**
     * Devuelve la vista de edicion de un tramite.
     *
     * @param integer $id
     * @return view
     */
    public function editarTramiteView($id) {
        try {
            $tramite = new Tramite();
            $tramite = $tramite->findById($id);
            return view('admin.editar_tramite', ['tramite' => $tramite]);
        } catch (\Exception $e) {
            return [$e->getMessage()];  // Devolver a vista de error con un mensaje.
        }
    }

    /**
     * Devuelve la vista de ver un tramite.
     *
     * @param integer $id
     * @return view
     */
    public function verTramiteView($id) {
        try {
            $tramite = new Tramite();
            $tramite = $tramite->findById($id);
            return view('public.ver_tramite', ['tramite' => $tramite]);
        } catch (\Exception $e) {
            return [$e->getMessage()];  // Devolver a vista de error con un mensaje.
        }
    }
}
