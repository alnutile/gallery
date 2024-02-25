<?php 

namespace App\OpenAi;

use App\Models\Gallery;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use OpenAI\Laravel\Facades\OpenAI;
use OpenAI\Responses\Images\CreateResponse;
use OpenAI\Responses\Meta\MetaInformation;

class GenerateImage {

    public function generate(Gallery $gallery) {
        $prompt = <<<EOT
Twhe image should fit on a computer screen well since it will be a background image or a screensaver like image:

The context of the image is: {$gallery->content}
EOT;        
        // Generate image
        if(config("openai.mock")) {
            Log::info("Mocking OpenAI image generation");
            $results = get_fixture("image_create_results.json");
            $results =  CreateResponse::from($results, MetaInformation::from([]));
        } else {
            $results = OpenAI::images()->create([
                'model' => 'dall-e-3',
                'prompt' => $prompt,
                'n' => 1,
                'size' => '1024x1024',
                'response_format' => 'b64_json',
            ]);
    
        }
        $image = data_get($results->data, "0.b64_json");
        $image = base64_decode($image);
        $string = Str::random(40) . '.png';
        Storage::disk('public')->put('gallery/' . $string, $image);

        $gallery->updateQuietly([
            'image_path' => $string
        ]);
        
        //put_fixture("image_create_results.json", $results);

    }
}