<?php

namespace App\Controller;

use App\Repository\AccomodationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(AccomodationRepository $accomodationRepository): Response //permet de récupérer le repo de Accomodation dans la vue default pour récupérer les données de cette entité et les render dans default/index.twig.html
    {

        $accomodations = $accomodationRepository->findAll();
        return $this->render('default/index.html.twig', [
            'accomodations' => $accomodations,
        ]);
    }
}
