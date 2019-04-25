<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    protected $table = 'listas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'descripcion'
    ];
    public $timestamps = false;

     // Relaciones entre Entidades
     public function tramite(){
        return $this->belongsTo('App\Tramite','id_tramite','id');
    }

     // Relaciones entre Entidades
     public function items(){
        return $this->hasMany('App\Item','id_lista','id');
    }

}
