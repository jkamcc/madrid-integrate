<?php

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
            $table->enum('documento', ['DNI', 'NIE']);            
            $table->string('nombre', 35);
            $table->string('apellido1', 18);
            $table->string('apellido2', 18);            
            $table->date('fecha_nacimiento');
            $table->string('lugar_nacimiento', 35);
            $table->enum('sexo', ['M', 'F']);
            $table->enum('estado_civil', 
                ['soltero','casado','separado','divorciado','viudo']);
            $table->string('nacionalidad');
            $table->string('ocupacion');
            $table->string('nivel_instruccion');

            $table->boolean('prestacion');
            $table->string('tipo_prestacion');//TODO valores especificios
            $table->string('tiempo_parado');//TODO valores especificios
            $table->boolean('empadronamiento');
            $table->string('lugar_empadronamiento');   

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
