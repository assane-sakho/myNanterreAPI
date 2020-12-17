<?php

namespace App\Controller\API;

use App\Repository\CategorieSportRepository;
use App\Service\ResponseService;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategorieSportController extends AbstractController
{
    private $responseService;

    public function __construct(ResponseService $responseService)
    {
        $this->responseService = $responseService;
    }

    /**
     * @Route("/api/getCategorieSport", name="api_sport_categorie")
     */
    public function getCategorieSport(CategorieSportRepository $categorieSportRepository)
    {
        $sportCategories = $categorieSportRepository->findAll();
        return $this->responseService->getJSONResponse($sportCategories);
    }
}
