<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hipervinculo extends Model
{
    protected $table = 'hipervinculos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'titulo',
        'orden',
        'id_tramite'
    ];
    public $timestamps = false;
    protected $with = ['links'];

    // Relaciones entre Entidades
    public function tramite(){
        return $this->belongsTo('App\Tramite','id_tramite','id');
    }

    public function links() {
        return $this->hasMany('App\Link', 'id', 'id_tramite');
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
            // Creo el componente.
            $this->titulo = $datos['titulo'];
            $this->orden = $datos['posicion'];
            $this->id_tramite = $id_tramite;
            $this->save();
    
            // Creo los links.
            foreach ($datos['links'] as $l) {
                $link = new Link();
                $link->crear($l, $this->id);
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
            // Recorre los hijos y los borra.
            $this->urls->map(function($url) {
                $url->delete();
            });

            $this->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
