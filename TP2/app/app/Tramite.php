<?php

namespace App;

use App\Texto;
use App\Lista;
use App\Hipervinculo;
use App\Adjunto;

use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    protected $table = 'tramites';
    protected $primaryKey = 'id';
    protected $fillable = [
        'titulo',
        'descripcion'
    ];
    protected $appends = ['componentes'];
    public $timestamps = false;

    /**
     * Relacion con los componentes de tipo lista
     */
    public function componentesLista(){
        return $this->hasMany('App\Lista','id_tramite','id');
    }

    /**
     * Relacion con los componentes de tipo subtitulo
     */
    public function componentesSubtitulo(){
        return $this->hasMany('App\Subtitulo','id_tramite','id');
    }

    /**
     * Relacion con lso componentes de tipo texto
     */
    public function componentesTexto(){
        return $this->hasMany('App\Texto','id_tramite','id');
    }

    /**
     * Relacion con lso componentes de tipo hipervinculo
     */
    public function componentesHipervinculo(){
        return $this->hasMany('App\Hipervinculo','id_tramite','id');
    }

    /**
     * Relacion con lso componentes de tipo adjunto
     */
    public function componentesAdjunto(){
        return $this->hasMany('App\Adjunto','id_tramite','id');
    }

    /**
     * Atributo que contiene todos los componentes del tramite.
     *
     * @return array $componentes
     */
    public function getComponentesAttribute(){
        $textos = $this->componentesTexto;
        $listas = $this->componentesLista;
        $hipervinculos = $this->componentesHipervinculo;
        $adjuntos = $this->componentesAdjunto;

        $aux1 = $textos->concat($listas);
        $aux2 = $hipervinculos->concat($adjuntos);
        $componentes = $aux1->concat($aux2);

        return $componentes->sortBy('orden');
    }

    /**
     * Devuelve todos los tramites.
     *
     * @return array $tramites
     */
    public function findAll() {
        return Tramite::all();
    }

    /**
     * Dado un id, devuelve un tramite.
     *
     * @param integer $id
     * @return App\Tramite
     */
    public function findById($id){
        return Tramite::find($id);
    }

    /**
     * Metodo de creacion de un tramite nuevo
     *
     * @param array $datos_request
     * @return App\Tramite
     */
    public function createTramite($datos_request) {
        // Ingreso los datos del tramite y lo guardo.
        $this->titulo = $datos_request['datos']['titulo'];
        $this->descripcion = $datos_request['datos']['descripcion'];
        $this->save();
        // Creo los componentes hijos.
        $this->crearComponentes($datos_request['datos']['componentes']);
    }

    /**
     * Recibe un arreglo de componentes y los crea.
     * 
     * @param array $componentes
     * @return boolean
     */
    public function crearComponentes($componentes) {
        try {
            foreach ($componentes as $componente) {
                switch ($componente['tipo']) {
                    case 'texto':
                        $texto = new Texto();
                        $texto->crear($componente, $this->id);
                        break;
                    case 'lista':
                        $lista = new Lista();
                        $lista->crear($componente, $this->id);
                        break;
                    case 'adjunto':
                        $adjunto = new Adjunto();
                        $adjunto->crear($componente, $this->id);
                        break;
                    case 'hipervinculo':
                        $hipervinculo = new Hipervinculo();
                        $hipervinculo->crear($componente, $this->id);
                        break;
                    default:
                        break;
                }
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Actualiza un tramite por completo (Tanto sus datos como los de sus detalles).
     * ,
     * @param array $datos
     * @return boolean $actualizados
     */
    public function updateTramite($datos) {
        try {
            // Actualizar datos basicos.
            $this->titulo = $datos['titulo'];
            $this->descripcion = $datos['descripcion'];

            // TODO.
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * Borra un tramite y sus componentes.
     *
     * @return boolean $borrado
     */
    public function removeTramite() {
        try {
            foreach ($this->componentes as $componente) {
                $componente->removeComponent();
            }
            $this->delete();

            return "true";
        } catch (\Exception $e) {
            echo $e->getMessage();
            return "false";
        }
    }

    /**
     * Recibe el nombre de un adjunto que pertenece a este tramite y devuelve el path de descarga.
     * 
     * @param string $nombre
     * @return string $path
     */
    public function getFilePath($nombre) {
        $adjunto = Adjunto::where('nombre_archivo', $nombre)->where('id_tramite', $this->id)->first();
        return config('app.files_directory').$this->id."/".$adjunto->nombre_archivo;
    }
}
