<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtitulo extends Model
{
    protected $table = 'subtitulos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'contenido'
    ];
    public $timestamps = false;

     // Relaciones entre Entidades
     public function tramite(){
        return $this->belongsTo('App\Tramite','id_tramite','id');
    }

}
