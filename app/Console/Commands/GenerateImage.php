<?php

namespace App\Console\Commands;

use App\Models\Gallery;
use Facades\App\OpenAi\GenerateImage as GenerateImageFacade;
use Illuminate\Console\Command;

class GenerateImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-image';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Yup';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $gallery = Gallery::first();
        $image = GenerateImageFacade::generate($gallery);
    }
}
