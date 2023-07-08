<?php

namespace App\Console\Commands;

use App\Models\Blog;
use Illuminate\Console\Command;
use App\Services\DiscordNotificationService;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Exception\ClientException;

class CheckWebsiteStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'website:status-check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check website status and send notifications';
    protected $discordNotificationService;

    /**
     * Execute the console command.
     */
    public function __construct(DiscordNotificationService $discordNotificationService)
    {
        parent::__construct();
        $this->discordNotificationService = $discordNotificationService;
    }

    public function handle()
    {


        $urlsToCheck = [

            'https://soungoolwin.me/',
            'https://soungoolwin.me/login/sss',
            'https://soungoolwin.me/signup/',
            'https://soungoolwin.me/signup/verify',
            'https://soungoolwin.me/dashboard/blogs/create',
            'https://soungoolwin.me/dashboard/blogs/showall',
        ];
        $client = new Client();

        $promises = [];

        foreach ($urlsToCheck as $url) {
            $promise = $client->getAsync($url)
                ->then(function ($response) use ($url) {
                    $statusCode = $response->getStatusCode();

                    if ($statusCode === 200) {
                        $this->info("URL: $url - Status: $statusCode");
                    } else {
                        $this->error("URL: $url - Status: $statusCode");
                        $this->discordNotificationService->sendErrorNotification("Website has errors");
                    }
                })
                ->otherwise(function ($exception) use ($url) {
                    $this->discordNotificationService->sendErrorNotification("URL: $url - Error: " . $exception->getMessage());
                });

            $promises[] = $promise;
        }

        // Wait for all promises to complete
        Promise\Utils::all($promises)->wait();

        $this->info('Website status check completed.');
    }
}
