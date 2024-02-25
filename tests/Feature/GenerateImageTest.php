<?php

namespace Tests\Feature;

use App\Models\Gallery;
use App\OpenAi\GenerateImage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use OpenAI\Laravel\Facades\OpenAI;
use Tests\TestCase;
use OpenAI\Responses\Images\CreateResponse;

class GenerateImageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_generate(): void
    {
        Storage::fake('public');
        $data = get_fixture('image_create_results.json');
        OpenAI::fake([
           CreateResponse::fake([
                'images' => $data,
           ])
        ]);

        $gallery = Gallery::factory()->create([
            'content' => 'a painting of a cat',
            'image_path' => null
        ]);

        $results = (new GenerateImage())->generate($gallery);

        $this->assertNotNull($gallery->refresh()->image_path);
        $this->assertFileExists(Storage::disk('public')->path('gallery/' . $gallery->refresh()->image_path));

    }
}
