<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivoAdjunto extends Model
{
    protected $fillable = [
        'path',
        'tipo',
        'id_adjunto'
    ];

    // Relaciones entre entidades.
    public function adjunto() {
        return $this->belongsTo('App\Adjunto', 'id_tramite', 'id');
    }

    /**
     * Crea el archivo adjunto.
     * 
     * @param array $datos
     * @param integer $id_adjunto
     * @return boolean
     */
    public function crear($datos, $id_adjunto) {
        try {
            $this->path = $datos['path'];
            $this->tipo = $datos['tipo'];
            $this->id_adjunto = $id_adjunto;
            $this->save();

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
