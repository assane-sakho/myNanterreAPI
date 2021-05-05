<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpClient\Exception\ClientException;

class ImageService
{
    private $client;

    public function __construct()
    {
        $this->client = HttpClient::create(['verify_peer' => false, 'verify_host' => false]);
    }

    public function getImageBytesFromUrl($url)
    {
        try{
            $response = $this->client->request('GET', $url);

            $content = base64_encode($response->getContent());

            return $content;
        }
        catch (ClientException $e) {
            return $_ENV['NANTERRE_LOGO_BASE64'];
        }
    }
}