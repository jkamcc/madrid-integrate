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
            $table->string('telefono', 9);
            $table->enum('sexo', Student::getValoresSexo());
            $table->enum('estado_civil', Student::getValoresEstadoCivil());
            $table->string('nacionalidad');
            $table->string('nivel_instruccion');
            $table->string('ocupacion', 35);

            $table->enum('tipo_documentacion', Student::getTipoDocumentacion());
            $table->boolean('prestacion');
            $table->string('tipo_prestacion')->nullable();

            $table->boolean('empadronamiento');
            $table->string('lugar_empadronamiento')->nullable();
            $table->string('tiempo_empadronamiento', 18)->nullable();
            $table->tinyInteger('tiempo_empadronamiento_anos')->nullable();
            $table->tinyInteger('tiempo_empadronamiento_meses')->nullable();

            $table->boolean('interes_emprendimiento'); 
            $table->enum('tipo_cuenta', Student::getTiposCuenta());  

            $table->string('trabajo_desempenado', 35);
            $table->string('trabajo_deseado', 35);
            $table->string('tiempo_parado', 18);
            $table->tinyInteger('tiempo_parado_anos');
            $table->tinyInteger('tiempo_parado_meses');

            $table->enum('conocimiento_tics', Student::getConocimientos());   
            $table->boolean('interes_aprender_tics'); 
            $table->boolean('cv_digital'); 
            $table->boolean('sabe_disenar_cv'); 

            $table->enum('regimen_vivienda', Student::getRegimenesVivienda());

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
