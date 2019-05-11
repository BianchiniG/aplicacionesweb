<?php

use Illuminate\Database\Seeder;
use App\Texto;

class TextoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Texto::create(array(
            'titulo' => '¿Donde?',
            'contenido' => 'En la universidad',
            'orden' => 1,
            'id_tramite' => 1
        ));
        Texto::create(array(
            'titulo' => '¿Hasta cuando tengo tiempo?',
            'contenido' => 'Las fechas de inscripción son del 01 al 31 de Marzo (Inclusive!)',
            'orden' => 3,
            'id_tramite' => 1
        ));

        Texto::create(array(
            'titulo' => '¿¿Donde?',
            'contenido' => 'Ahora no hace falta que te acerques a la universidad, lo sacas online y lo recibis al mail cuando esta listo!',
            'orden' => 1,
            'id_tramite' => 2
        ));

        Texto::create(array(
            'titulo' => '¿¿Donde?',
            'contenido' => 'En la sede de tu facultad',
            'orden' => 1,
            'id_tramite' => 3
        ));
        Texto::create(array(
            'titulo' => '¿Cuando son las mesas?',
            'contenido' => 'Las mesas son mensuales y varían año a año (Ver calendario). ',
            'orden' => 2,
            'id_tramite' => 3
        ));
        Texto::create(array(
            'titulo' => '¿Que otra cosa tengo que saber?',
            'contenido' => 'Tener en cuenta que se piden 2 finales por año para la regularidad y que para anotarse hay tiempo hasta 2 días antes de la mesa!',
            'orden' => 3,
            'id_tramite' => 3
        ));
    }
}
