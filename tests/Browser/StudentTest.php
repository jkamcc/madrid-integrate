<?php

namespace Tests\Browser;

use App\Student;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class StudentTest extends DuskTestCase
{
    use DatabaseMigrations;

    public $id = 'A12345678';

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreateStudent()
    {

        $student = factory(Student::class)->make();
        echo $this->id;
        $student->id = $this->id;
        print_r('student_id:'.$student->id);
        $this->browse(function ($browser) use ($student) {
            $browser->visit('/estudiantes/nuevo')
                    ->assertSee('Nuevo Estudiante')
                    ->type('id', 'A12345678')
                    ->type('nombre', $student->nombre)
                    ->type('apellido1', $student->apellido1)
                    ->type('apellido2', $student->apellido2)
                    ->type('fecha_nacimiento', '12/12/1992')
                    ->type('lugar_nacimiento', 'test')
                    ->press('Guardar')
                    ->assertPathIs('/estudiantes');
        });
    }

    /**
     * @param Student $student
     * @return array
     */
    private function typeValidData(Student $student)
    {
        $datosEstudiante = [
            'id'=> 'A12345678',
            'nombre'=> $student->nombre,
            'apellido1'=> $student->apellido1,
            'apellido2'=> $student->apellido2,
            'fecha_nacimiento'=> '12/12,1992',
            'lugar_nacimiento'=> 'test'
        ];

        foreach ($datosEstudiante as $datoEstudiante) {

        }

        return $datosEstudiante;
    }
}
