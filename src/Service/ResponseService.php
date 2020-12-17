<?php

namespace App\Service;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\HttpFoundation\Response;

class ResponseService
{
    private $normalizer;
    
    public function __construct(NormalizerInterface $normalizer)
    {
        $this->normalizer = $normalizer;
    }

    public function getJSONResponse($data)
    {
        $dataNormalized = $this->normalizer->normalize($data);
        $json = json_encode($dataNormalized, JSON_PRETTY_PRINT);

        $response = new Response($json);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
