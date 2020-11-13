<?php

namespace App\Controller;

use App\Entity\Accomodation;
use App\Entity\Booking;
use App\Entity\User;
use App\Form\AccomodationType;
use App\Form\BookingType;
use App\Repository\AccomodationRepository;
use App\Repository\BookingRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/accomodation")
 */
class AccomodationController extends AbstractController
{
    /**
     * @Route("/", name="accomodation_index", methods={"GET"})
     */
    public function index(AccomodationRepository $accomodationRepository): Response
    {
        return $this->render('accomodation/index.html.twig', [
            'accomodations' => $accomodationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="accomodation_new", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function new(Request $request): Response
    {
        $accomodation = new Accomodation();
        $form = $this->createForm(AccomodationType::class, $accomodation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($accomodation);
            $entityManager->flush();

            return $this->redirectToRoute('accomodation_index');
        }

        return $this->render('accomodation/new.html.twig', [
            'accomodation' => $accomodation,
            'form' => $form->createView(),
        ]);
    }



    /**
     * @Route("/{id}", name="accomodation_show", methods={"GET", "POST"})
     */
    public function show(Accomodation $accomodation, Request $request, BookingRepository $bookingRepository): Response
    {
        $booking = new Booking();
        $user = $this->getUser();
        $booking->setUser($user);//permet de préselectionner l'utilisateur connecté
        $booking->setAccomodation($accomodation);//permet de préselectionner l'accomodation en cours
        $form = $this->createForm(BookingType::class, $booking, [
//pour envoyer les données du formulaire
            'method' => 'GET'
        ]);

        $form->handleRequest($request);//verifie les données du formulaire

        if ($form->isSubmitted() && $form->isValid()) {
            $booking = $form->getData(); //récupère les données du formulaire
            //enregistre en base de données
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($booking);
            $entityManager->flush();
//            message si la réservation s'est bien passée
            $this->addFlash('success', "Réservation enregistrée avec succès");

            return $this->redirectToRoute('user_show', ['id' => ($booking->getUser())->getId()]);
        }

        return $this->render('accomodation/show.html.twig', [
            'accomodation' => $accomodation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="accomodation_edit", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function edit(Request $request, Accomodation $accomodation): Response
    {
        $form = $this->createForm(AccomodationType::class, $accomodation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('accomodation_index');
        }

        return $this->render('accomodation/edit.html.twig', [
            'accomodation' => $accomodation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="accomodation_delete", methods={"DELETE"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, Accomodation $accomodation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$accomodation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($accomodation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('accomodation_index');
    }
}
