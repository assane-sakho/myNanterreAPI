<?php

namespace App\Controller\API;

use App\Repository\CategorieSportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CategorieSportController extends AbstractController
{
    /**
     * @Route("/api/getCategorieSport", name="api_sport_categorie")
     */
    public function getCategorieSport(CategorieSportRepository $categorieSportRepository, NormalizerInterface $normalize)
    {
        $sportCategories = $categorieSportRepository->findAll();
        $sportCategoriesNormalises = $normalize->normalize($sportCategories);

        $json = json_encode($sportCategoriesNormalises);

        dd($json);

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ApiSportCategorieController.php',
        ]);
    }
}
