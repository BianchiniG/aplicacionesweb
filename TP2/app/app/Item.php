<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $primaryKey = 'id';
    protected $fillable = [
        'contenido',
        'id_lista'
    ];
    public $timestamps = false;

    // Relaciones entre Entidades
    public function lista(){
        return $this->belongsTo('App\Lista','id_lista','id');
    }

    /**
     * Devuelve un item.
     * 
     * @param integer $id
     * @return App\Item
     */
    public function getItemById($id) {
        return Item::find($id);
    }

    /**
     * Crea el item
     * 
     * @param array $datos
     * @param integer $id_lista
     * @return boolean
     */
    public function crear($datos, $id_lista) {
        try {
            $this->contenido = $datos['contenido'];
            $this->id_lista = $id_lista;
            $this->save();

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
