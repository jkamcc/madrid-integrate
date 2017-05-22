<?php

namespace Tests\Browser;

use App\Student;
use App\User;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class StudentTest extends DuskTestCase
{
    use DatabaseMigrations;

    public $id = 'A12345678';

    /**
     * Ejecutar los seed para tener los usuarios
     */
    protected function setUp() 
    {
      parent::setUp();
      
      if (User::count() == 0)
      {
        $this->artisan('db:seed');  
      }  
    
    }

    /**
     * Verifica el crear un estudiante correctamente
     * @return void
    */
    public function testCrearEstudianteTodosRequeridos()
    {
        //$this->call(UsersTableSeeder::class);
        $student = factory(Student::class)->make();
        echo "\nstudent:".$student."\n";

        $this->browse(function ($browser) use ($student) {
            $browser->loginAs(User::find(1))
                    ->visit('/estudiantes/nuevo')
                    ->assertSee('Nuevo Estudiante')
                    ->type('id', 'A12345678')
                    ->type('nombre', $student->nombre)
                    ->type('apellido1', $student->apellido1)
                    ->type('apellido2', $student->apellido2)
                    ->type('fecha_nacimiento', '12/12/1992')
                    ->type('lugar_nacimiento', $student->lugar_nacimiento)
                    ->select('estado_civil', $student->estado_civil)
                    ->radio('sexo', $student->sexo)
                    ->select('nacionalidad', $student->nacionalidad)
                    ->type('nivel_instruccion', $student->nivel_instruccion)
                    ->type('ocupacion', $student->ocupacion)
                    ->type('telefono', $student->telefono)

                    ->radio('tipo_documentacion', $student->tipo_documentacion)
                    ->radio('prestacion', 1)
                    ->select('tipo_prestacion', $student->tipo_prestacion)

                    ->radio('empadronamiento', 1)
                    ->type('lugar_empadronamiento', $student->lugar_empadronamiento)
                    ->type('tiempo_empadronamiento_anos', $student->tiempo_empadronamiento_anos)
                    ->type('tiempo_empadronamiento_meses', $student->tiempo_empadronamiento_meses)

                    ->radio('interes_emprendimiento', $student->interes_emprendimiento)
                    ->radio('tipo_cuenta', $student->tipo_cuenta)

                    ->type('trabajo_desempenado', $student->trabajo_desempenado)
                    ->type('trabajo_deseado', $student->trabajo_deseado)
                    ->type('tiempo_parado_anos', $student->tiempo_parado_anos)
                    ->type('tiempo_parado_meses', $student->tiempo_parado_meses)

                    ->radio('conocimiento_tics', $student->conocimiento_tics)
                    ->radio('interes_aprender_tics', (String) $student->interes_aprender_tics)
                    ->radio('cv_digital', (String) $student->cv_digital)
                    ->radio('sabe_disenar_cv', (String) $student->sabe_disenar_cv)

                    ->press('Guardar')
                    ->assertPathIs('/estudiantes')
                    ->assertDontSee('Whoops, looks like something went wrong.');
        });
    }

    /**
     * Verificar que son mostrados todos los mensajes de error para los campos requeridos
     * @return void
     */
    public function validarMensajesErrorInputs()
    {
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
