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
    }

    /** @test */
    public function get_single_student()
    {
        $this->seed();
        $response = $this->get('/api/student/1');
        $response->assertStatus(200);
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
