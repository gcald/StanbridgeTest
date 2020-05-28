<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Faker\Generator as Faker;
use App\Student;

class StudentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_student_list()
    {
        $this->seed();
        $response = $this->get('/api/students');
        $response->assertStatus(200);

        // Test first student
        $response->assertJsonPath("data.0.student_id", '1605092601799');
        $response->assertJsonPath("data.0.first_name", 'Melvin');
        $response->assertJsonPath("data.0.last_name", 'Levine');
        $response->assertJsonPath("data.0.email", 'libero@ultricessitamet.co.uk');

        // Test second student
        $response->assertJsonPath("data.1.student_id", '1627060401499');
        $response->assertJsonPath("data.1.first_name", 'Elaine');
        $response->assertJsonPath("data.1.last_name", 'Donaldson');
        $response->assertJsonPath("data.1.email", 'Morbi.vehicula@imperdiet.ca');

    }

    /** @test */
    public function get_single_student()
    {
        $this->seed();
        $response = $this->get('/api/student/1');
        $response->assertStatus(200);
        $response->assertJsonPath("data.student_id", '1605092601799');
        $response->assertJsonPath("data.first_name", 'Melvin');
        $response->assertJsonPath("data.last_name", 'Levine');
        $response->assertJsonPath("data.email", 'libero@ultricessitamet.co.uk');

    }

    /** @test */
    public function update_student_attendance()
    {
        $this->seed();

        $this->assertEquals(Student::find(1)->status, 'absent');

        $response = $this->put('/api/student/1', ['status' => 'present']);
        $response->assertStatus(200);

        $this->assertEquals(Student::find(1)->status, 'present');

    }

}
