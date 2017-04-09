<?php

namespace Tests\Browser;

use App\Student;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class StudentTest extends DuskTestCase
{
    use DatabaseMigrations;

    public $id = 'A12345678';

    /**
     * Verifica el crear un estudiante correctamente
     * @return void
    */
    public function testCrearEstudiante()
    {

        $student = factory(Student::class)->make();
        print_r('\nstudent:'.$student);
        $this->browse(function ($browser) use ($student) {
            $browser->visit('/estudiantes/nuevo')
                    ->assertSee('Nuevo Estudiante')
                    ->type('id', 'A12345678')
                    ->type('nombre', $student->nombre)
                    ->type('apellido1', $student->apellido1)
                    ->type('apellido2', $student->apellido2)
                    ->type('fecha_nacimiento', '12/12/1992')
                    ->type('lugar_nacimiento', $student->lugar_nacimiento)
                    ->select('estado_civil', $student->estado_civil)
                    ->radio('sexo', $student->sexo)
                    ->select('nacionalidad', 'España') //todo cambiar a random
                    ->type('nivel_instruccion', $student->nivel_instruccion)
                    ->type('ocupacion', $student->ocupacion)

                    ->radio('tipo_documentacion', $student->tipo_documentacion) 

                    ->press('Guardar')
                    ->assertPathIs('/estudiantes')
                    ->assertDontSee('Whoops, looks like something went wrong.');
        });
    }

    /**
     * Verificar que son mostrados todos los mensajes de error para los campos requeridos
     * @return void
     */
    public function testValidarMensajesErrorInputs()
    {
       echo "\ntestValidarErroresInputs";
       $inputs = $this->getInputs();
       $this->browse(function ($browser) use($inputs) {
          $browser->visit('/estudiantes/nuevo')
              ->assertSee('Nuevo Estudiante');

          foreach ($inputs as $input) {
              $browser->clear($input);
          }

          $browser->press('Guardar');

          /* esperando textos de error*/
          foreach ($inputs as $input) {
              $browser->waitFor('#'.$input.'+.text-danger');
          }
       });
    }    

    private function getInputs() {
        return ['id', 'nombre', 'apellido1', 'apellido2', 'fecha_nacimiento', 'lugar_nacimiento'];
    }

}
