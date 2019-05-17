<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hipervinculo extends Model
{
    protected $table = 'hipervinculos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'titulo',
        'url'
    ];
    public $timestamps = false;

    // Relaciones entre Entidades
    public function tramite(){
        return $this->belongsTo('App\Tramite','id_tramite','id');
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
