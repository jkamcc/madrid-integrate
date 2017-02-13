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
            $table->timestamps();            
            $table->char('id', 9)->unique();                        
            $table->enum('documento', ['DNI', 'NIE']);            
            $table->string('nombre', 35);
            $table->string('apellido1', 18);
            $table->string('apellido2', 18);            
            $table->date('fecha_nacimiento');
            $table->enum('genero', ['M', 'F']);
            $table->string('estado_civil', 35);
            $table->string('nacionalidad');
            $table->string('ocupacion');
            $table->string('nivel_instruccion');    
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
