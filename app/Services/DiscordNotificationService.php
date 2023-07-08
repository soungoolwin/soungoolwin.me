<?php

namespace App\Services;

use GuzzleHttp\Client;

class DiscordNotificationService
{
    protected $webhookUrl;

    public function __construct()
    {
        $this->webhookUrl = 'https://discord.com/api/webhooks/1115677369575931945/E-BAgVS9T_mS5Q4PpS1xDd2orxfa2hIwzPSxsSDYH238SFXB8k-Qd-XY0PNGOLpztjDr';
    }

    public function sendUserSignupNotification($userData)
    {


        $payload = [
            'content' => "**User Signup Event**\n\nNew user Logged in on your website!\n\nDetails:\n" . json_encode($userData['email']),
        ];

        $client = new Client();
        $client->post($this->webhookUrl, ['json' => $payload]);
    }
    public function sendErrorNotification($message)
    {
        $payload = [
            'content' => 'Error: ' . $message,
        ];

        $client = new Client();
        $client->post($this->webhookUrl, [
            'json' => $payload,
        ]);
    }

    // Implement other notification methods as needed
}
