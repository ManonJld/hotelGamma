<?php

namespace App\Controller\Admin;

use App\Entity\Accomodation;
use App\Entity\Amenity;
use App\Entity\Booking;
use App\Entity\Category;
use App\Entity\Photo;
use App\Entity\Type;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Hotel Gamma');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Logements', 'icon class', Accomodation::class);
        yield MenuItem::linkToCrud('Equipements', 'icon class', Amenity::class);
        yield MenuItem::linkToCrud('Réservations', 'icon class', Booking::class);
        yield MenuItem::linkToCrud('Catégories', 'icon class', Category::class);
        yield MenuItem::linkToCrud('Photos', 'icon class', Photo::class);
        yield MenuItem::linkToCrud('Types', 'icon class', Type::class);
        yield MenuItem::linkToCrud('Users', 'icon class', User::class);
    }
}
