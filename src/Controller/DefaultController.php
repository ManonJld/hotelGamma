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
    public function index(TypeRepository $typeRepository, BookingRepository $bookingRepository): Response //permet de récupérer le repo de Accomodation dans la vue default pour récupérer les données de cette entité et les render dans default/index.twig.html
    {

        $types = $typeRepository->findAll();
        $accomodations =  $bookingRepository->findMostBooking();
        return $this->render('default/index.html.twig', [
            'accomodations' => $accomodations,
            'types' => $types,
        ]);

    }

    /**
     * @Route("/resultats", name="homepage_results", methods={"GET"})
     */
    public function results(TypeRepository $typeRepository, AccomodationRepository $accomodationRepository, Request $request)
    {
        $type_id = $request->query->get('type_id');
        $min = $request->query->get('min');
        $max= $request->query->get('max');

        $types = $typeRepository->findAll();
        $accomodations = $accomodationRepository->findRequest($type_id, $min, $max);
        return $this->render('default/results.html.twig', [
        'accomodations' => $accomodations,
        'types' =>$types,
            'type_id' => $type_id,
            'min'=>$min,
            'max'=>$max]);
    }
}
