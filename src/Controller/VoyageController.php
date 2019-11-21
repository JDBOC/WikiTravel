<?php

namespace App\Controller;

use App\Repository\VoyageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VoyageController extends AbstractController
{
    /**
     * @Route("/voyage", name="voyage")
     */
    public function index(VoyageRepository $repository)
    {
        return $this->render('voyage/index.html.twig', [
            'voyages' => $repository->findAll (),
        ]);
    }
}
