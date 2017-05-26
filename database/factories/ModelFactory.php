<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

namespace App;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(User::class, function (\Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Student::class, function (\Faker\Generator $faker) {

    return [
        'nombre' => $faker->firstName,
        'apellido1' => $faker->lastName,
        'apellido2' => $faker->lastName,
        'fecha_nacimiento' => $faker->date($format='d/m/Y'),
        'lugar_nacimiento' => $faker->city,
        'telefono' => $faker->randomNumber(9, true),
        'sexo' => $faker->randomElement(Student::getValoresSexo()),
        'estado_civil' => $faker->randomElement(Student::getValoresEstadoCivil()),
        'nivel_instruccion' => $faker->text(255),
        'ocupacion' => $faker->jobTitle(),
        'tipo_documentacion' => $faker->randomElement(Student::getTipoDocumentacion()),
        'nacionalidad' => $faker->randomElement(Student::getNacionalidades())->name,
        'prestacion' => (int) $faker->boolean,
        'tipo_prestacion' => $faker->randomElement(Student::getTipoPrestacionValores()),
        'empadronamiento' => (int) $faker->boolean,
        'lugar_empadronamiento' => $faker->text(255),
        'tiempo_empadronamiento' => $faker->text(35),
        'tiempo_empadronamiento_anos' => $faker->numberBetween(0, 20),
        'tiempo_empadronamiento_meses' => $faker->numberBetween(0, 12),
        'interes_emprendimiento' => (int) $faker->boolean,
        'tipo_cuenta' => $faker->randomElement(Student::getTiposCuenta()),
        'trabajo_desempenado' => $faker->text(35),
        'trabajo_deseado' => $faker->text(35),
        'tiempo_parado_anos' => $faker->numberBetween(0, 20),
        'tiempo_parado_meses' => $faker->numberBetween(0, 12),
        'conocimiento_tics' => $faker->randomElement(Student::getConocimientos()),
        'interes_aprender_tics' => (int) $faker->boolean,
        'cv_digital' => (int) $faker->boolean,
        'sabe_disenar_cv' => (int) $faker->boolean,
        'regimen_vivienda' => $faker->randomElement(Student::getRegimenesVivienda())
    ];
});
