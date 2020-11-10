<?php

namespace App\Controller\API;

use App\Repository\CategorieSportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\HttpFoundation\Response;

class CategorieSportController extends AbstractController
{
    /**
     * @Route("/api/getCategorieSport", name="api_sport_categorie")
     */
    public function getCategorieSport(CategorieSportRepository $categorieSportRepository, NormalizerInterface $normalize)
    {
        $sportCategories = $categorieSportRepository->findAll();
        $sportCategoriesNormalises = $normalize->normalize($sportCategories);
        $json = json_encode($sportCategoriesNormalises, JSON_PRETTY_PRINT);

        $response = new Response($json);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
