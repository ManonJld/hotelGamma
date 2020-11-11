<?php

namespace App\Controller;

use App\Repository\AccomodationRepository;
use App\Repository\BookingRepository;
use App\Repository\TypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index( AccomodationRepository $accomodationRepository,TypeRepository $typeRepository, BookingRepository $bookingRepository): Response //permet de récupérer le repo de Accomodation dans la vue default pour récupérer les données de cette entité et les render dans default/index.twig.html
    {

        $types = $typeRepository->findAll();
        $accomodations = $accomodationRepository->findAll();
//        $secondAccomodations = $bookingRepository->findMostBooking();
//        $test = var_dump($secondAccomodations);
        return $this->render('default/index.html.twig', [
            'accomodations' => $accomodations,
            'types' => $types,
//            'test' =>$test
        ]);

    }

}
