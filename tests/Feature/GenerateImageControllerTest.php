<?php

namespace Tests\Feature;

use App\Models\Gallery;
use Facades\App\OpenAi\GenerateImage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GenerateImageControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_generates(): void
    {
        Gallery::factory()->create();
       GenerateImage::shouldReceive('generate')->once();

        $response = $this->get(route('generate'));
    }
}
