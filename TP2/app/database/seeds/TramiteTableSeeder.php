<?php

use Illuminate\Database\Seeder;
use App\Tramite;

class TramiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tramite::create(array(
            'icono' => 'fa-list',
            'titulo' => 'Inscripcion a la Uni',
            'descripcion' => 'Todo lo que necesitas para inscribirte en alguna carrera de la facu!'
        ));

        Tramite::create(array(
            'icono' => 'fa-list',
            'titulo' => 'Certificado de Alumno Regular',
            'descripcion' => 'Enterate aca de como sacar el certificado de alumno regular!'
        ));

        Tramite::create(array(
            'icono' => 'fa-list',
            'titulo' => 'Inscripcion a Examen Final',
            'descripcion' => 'Inscribite para rendir cualquier materia'
        ));
    }
}
