<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    protected $table = 'tramites';
    protected $primaryKey = 'id';
    protected $fillable = [
        'titulo',
        'descripcion'
    ];
    protected $appends = ['componentes'];
    public $timestamps = false;

    /**
     * Relacion con los componentes de tipo lista
     */
    public function componentesLista(){
        return $this->hasMany('App\Lista','id_tramite','id');
    }

    /**
     * Relacion con los componentes de tipo subtitulo
     */
    public function componentesSubtitulo(){
        return $this->hasMany('App\Subtitulo','id_tramite','id');
    }

    /**
     * Relacion con lso componentes de tipo texto
     */
    public function componentesTexto(){
        return $this->hasMany('App\Texto','id_tramite','id');
    }

    /**
     * Atributo que contiene todos los componentes del tramite.
     * 
     * @return array $componentes
     */
    public function getComponentesAttribute(){
        $textos = $this->componentesTexto;
        $listas = $this->componentesLista;

        $componentes = $textos->concat($listas);

        return $componentes->sortBy('orden');
    }

    /**
     * Devuelve todos los tramites.
     * 
     * @return array $tramites
     */
    public function findAll() {
        return Tramite::all();
    }

    /**
     * Dado un id, devuelve un tramite.
     * 
     * @param integer $id
     * @return App\Tramite
     */
    public function findById($id){
        return Tramite::find($id);
    }

    /**
     * Metodo de creacion de un tramite nuevo
     * 
     * @param array $datos
     * @return App\Tramite
     */
    public function createTramite($datos) {
        return Tramite::create($datos);
    }

    /**
     * Actualiza un tramite por completo (Tanto sus datos como los de sus detalles).
     * ,
     * @param array $datos
     * @return boolean $actualizados
     */
    public function updateComplete($datos) {
        try {
            // Recorrer los borrados.
            foreach ($datos['componentes_borrados'] as $componente) {
                $componente->removeComponent();
            }

            // Recorrer el resto.
            foreach ($datos['componentes_actualizados'] as $componente) {
                // $componente->update
            }

            // Actualizar datos basicos.
            $this->titulo = $datos['titulo'];
            $this->descripcion = $datos['descripcion'];
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * Borra un tramite y sus componentes.
     * 
     * @return boolean $borrado
     */
    public function removeTramite() {
        try {
            foreach ($this->componentes as $componente) {
                echo get_class($componente);
                $componente->removeComponent();
            }
            $this->delete();
            
            return "true";
        } catch (\Exception $e) {
            echo $e->getMessage();
            return "false";
        }
    }
}
