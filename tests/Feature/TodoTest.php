<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Todo;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TodoTest extends TestCase {

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample() {

        $todo = new Todo(['value' => 'Test']);
        $this->assertEquals('Test', $todo->value);
    }

}
