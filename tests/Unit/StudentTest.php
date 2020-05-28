<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class StudentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_student_list()
    {
        $response = $this->get('/api/students');
        $response->assertStatus(200);
    }

}
