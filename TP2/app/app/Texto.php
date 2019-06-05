<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Texto extends Model
{
    protected $table = 'textos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'titulo',
        'contenido',
        'orden',
        'id_tramite'
    ];
    public $timestamps = false;

    // Relaciones entre Entidades
    public function tramite(){
        return $this->belongsTo('App\Tramite','id_tramite','id');
    }

    /**
     * Crea el componente.
     * 
     * @param array $datos
     * @param integer $id_tramite
     * @return App\Texto
     */
    public function crear($datos, $id_tramite) {
        try {
            $this->titulo = $datos['titulo'];
            $this->contenido = $datos['contenido'];
            $this->orden = $datos['posicion'];
            $this->id_tramite = $id_tramite;
            $this->save();
            
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Borra el componente.
     * 
     * @return boolean $borrado
     */
    public function removeComponent() {
        try {
            $this->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
