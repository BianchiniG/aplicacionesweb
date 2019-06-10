<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adjunto extends Model
{
    protected $table = 'adjuntos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'titulo',
        'orden',
        'id_tramite'
    ];
    public $timestamps = false;
    protected $with = ['archivos'];


    // Relaciones entre Entidades
    public function tramite(){
        return $this->belongsTo('App\Tramite','id_tramite','id');
    }

    public function archivos() {
        return $this->hasMany('App\ArchivoAdjunto', 'id', 'id_tramite');
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
            // Creo el componente adjunto.
            $this->titulo = $datos['titulo'];
            $this->orden = $datos['posicion'];
            $this->id_tramite = $id_tramite;
            $this->save();

            // Creo los archivos del adjunto
            foreach ($datos['archivos'] as $archivo) {
                $archivo_adjunto = new ArchivoAdjunto();
                $archivo_adjunto->crear($archivo, $this->id);
            }

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
            $this->archivos->map(function($archivo) {
                $archivo->delete();
            });

            $this->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
