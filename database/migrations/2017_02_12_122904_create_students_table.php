<?php

use App\Student;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {                        
            
            $table->char('id', 9)->unique();                                 
            $table->string('nombre', 35);
            $table->string('apellido1', 18);
            $table->string('apellido2', 18);            
            $table->date('fecha_nacimiento');
            $table->string('lugar_nacimiento', 35);
            $table->enum('sexo', Student::getValoresSexo());
            $table->enum('estado_civil',
                 Student::getValoresEstadoCivil());
            // $table->string('nacionalidad');
            $table->string('nivel_instruccion');
            $table->string('ocupacion', 35);

            $table->enum('tipo_documentacion', Student::getTipoDocumentacion());
            $table->boolean('prestacion');
            // $table->string('tipo_prestacion');//TODO valores especificios
            // $table->string('tiempo_parado');//TODO valores especificios

            // $table->boolean('empadronamiento');
            // $table->string('lugar_empadronamiento');
            // $table->string('tiempo_empadronamiento');   

            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
