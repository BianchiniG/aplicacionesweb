<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'links';
    protected $primaryKey = 'id';
    protected $fillable = [
        'descripcion',
        'url',
        'id_hipervinculo'
    ];
    public $timestamps = false;

    // Relaciones entre entidades.
    public function hipervinculo() {
        return $this->belongsTo('App\Hipervinculo', 'id_tramite', 'id');
    }

    /**
     * Crea el URL.
     * 
     * @param array $datos.
     * @param integer $id_hipervinculo
     * @return boolean
     */
    public function crear($datos, $id_hipervinculo) {
        try {
            $this->url = $datos['url'];
            $this->descripcion = $datos['descripcion'];
            $this->hipervinculo = $id_hipervinculo;
            $this->save();

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
