<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StudentTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndex()
    {
    	$response = $this->get('estudiantes');
        $response->assertStatus(200);
        $response->assertViewHas('students');
        $students = $response->original->students;
        //print_r($students);
        //$response->original->students;
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $students);
        if (!emptyArray($students)) {
            $this->assertInstanceOf('App\Student', $students[0]);
        }
    }

    public function testStore()
    {
        $data = [
            'id' => '123456789',
            'nombre' => 'test',
            'apellido1' => 'test2',
            'apellido2' => 'test3'
        ];
        $response = $this->post('estudiantes', $data);
        //print_r($response->original->);
        //$response->assertStatus(200);
    }
}
