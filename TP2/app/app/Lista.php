<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    protected $table = 'listas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'titulo',
        'descripcion'
    ];
    public $timestamps = false;
    protected $with = ['items']; // Carga ansiosa de Items

     // Relaciones entre Entidades
     public function tramite(){
        return $this->belongsTo('App\Tramite','id_tramite','id');
    }

     // Relaciones entre Entidades
     public function items(){
        return $this->hasMany('App\Item','id_lista','id');
    }

    /**
     * Borra el componente.
     * 
     * @return boolean $borrado
     */
    public function removeComponent() {
        echo "Entre a borrar una lista\n";
        try {
            foreach ($this->items as $item) {
                echo "Recorriendo los items\n";
                $item->delete();
            }
            $this->delete();

            return true;
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
