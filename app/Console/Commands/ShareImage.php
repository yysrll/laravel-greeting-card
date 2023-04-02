<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;

class ShareImage extends Command
{
    protected $signature = 'share {url}';
    protected $description = 'Share an image using the default device';

    public function handle()
    {
        $url = $this->argument('url');

        // Share the image file using the default device
        if (App::isProduction()) {
            Artisan::call('socialite:redirect', [
                'driver' => 'share',
                'url' => $url
            ]);
        } else {
            $this->info("Share URL: $url");
        }
    }
}
