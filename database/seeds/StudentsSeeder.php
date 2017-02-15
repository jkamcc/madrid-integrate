<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = new Student();
        $student->id = str_random(6);
        $student->nombre = 'Pedro';
        $student->apellido1 = 'Lopez';
        $student->apellido2 = 'Perez';
        $student->fecha_nacimiento = date('Y-m-d H:i:s');
		$student->genero = 'M';
		$student->estado_civil = 'soltero';
		$student->nacionalidad = 'Colombiano';
		$student->ocupacion = 'Soldador';
		$student->nivel_instruccion = 'test';
		$student->prestacion = true;
		$student->tipo_prestacion = 'test';
		$student->tiempo_parado = 'test';
		$student->empadronamiento = true;
		$student->lugar_empadronamiento = 'test';
        
        $student->save();
    }
}
