<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    protected $table = 'listas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'titulo',
        'descripcion',
        'orden',
        'id_tramite'
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
     * Crea el componente.
     * 
     * @param array $datos
     * @param integer $id_tramite
     * @return App\Texto
     */
    public function crear($datos, $id_tramite) {
        try {
            // Primero creo el componente LISTA
            $this->titulo = $datos['titulo'];
            $this->descripcion = $datos['descripcion'];
            $this->orden = $datos['posicion'];
            $this->id_tramite = $id_tramite;
            $this->save();
    
            // Creo los items
            foreach ($datos['items'] as $i) {
                $item = new Item();
                $item->crear($i, $this->id);
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
            foreach ($this->items as $item) {
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
