<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class ImageService
{
    private $client;

    public function __construct()
    {
        $this->client = HttpClient::create(['verify_peer' => false, 'verify_host' => false]);
    }

    public function getImageBytesFromUrl($url)
    {
        $response = $this->client->request('GET', $url);

        $content = base64_encode($response->getContent());

        return $content;
    }
}