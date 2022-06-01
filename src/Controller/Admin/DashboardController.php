<?php

namespace App\Controller\Admin;

use App\Entity\ContactForm;
use App\Entity\ImageHeader;
use App\Entity\ImageProject;
use App\Entity\Project;
use App\Entity\SliderGames;
use App\Entity\SliderHobbies;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator->setController(ProjectCrudController::class)->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Mon portfolio');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Return');
        yield MenuItem::linkToRoute('Home', 'fas fa-home', 'app_app');

        yield MenuItem::section('Project');
        yield MenuItem::subMenu('Action', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Add Project', 'fas fa-plus', Project::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Project', 'fas fa-eye', Project::class)
        ]);
        yield MenuItem::section('Image Header');
        yield MenuItem::subMenu('Action', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Add Image Header', 'fas fa-plus', ImageHeader::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Image Header', 'fas fa-eye', ImageHeader::class)
        ]);
        yield MenuItem::section('Image Project');
        yield MenuItem::subMenu('Action', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Add Image Project', 'fas fa-plus', ImageProject::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Image Project', 'fas fa-eye', ImageProject::class)
        ]);
        yield MenuItem::section('Slider Games');
        yield MenuItem::subMenu('Action', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Add Slider Games', 'fas fa-plus', SliderGames::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Slider Games', 'fas fa-eye', SliderGames::class)
        ]);
        yield MenuItem::section('Slider Hobbies');
        yield MenuItem::subMenu('Action', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Add Slider Hobbies', 'fas fa-plus', SliderHobbies::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Slider Hobbies', 'fas fa-eye', SliderHobbies::class)
        ]);
        yield MenuItem::section('Contact Form');
        yield MenuItem::subMenu('Action', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Show Contact Form', 'fas fa-eye', ContactForm::class)
        ]);

    }
}
