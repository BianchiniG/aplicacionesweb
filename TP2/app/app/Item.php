<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $primaryKey = 'id';
    protected $fillable = [
        'contenido'
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
}
