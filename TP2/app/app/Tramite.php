<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    protected $table = 'tramites';
    protected $primaryKey = 'id';
    protected $fillable = [
        'titulo',
        'descripcion'
    ];
    public $timestamps = false;

    // Relaciones entre Entidades
    public function componentesLista(){
        return $this->hasMany('App\Lista','id_tramite','id');
    }

    public function componentesSubtitulo(){
        return $this->hasMany('App\Subtitulo','id_tramite','id');
    }

    public function componentesTexto(){
        return $this->hasMany('App\Texto','id_tramite','id');
    }

    // Retorna TODOS los Tramites.
    public function findAll() {
        return Tramite::all();
    }

    // Busca un Tramite por ID
    public function findById($id){
        return Tramite::find($id);
        }

    // Retorna todos los componentes de ese tramite
    public function getComponentes(){
        $textos = $this->componentesTexto;
        $listas = $this->componentesLista;

        $componentes = $textos->concat($listas);

        return $componentes->sortBy('orden');
    }


}
