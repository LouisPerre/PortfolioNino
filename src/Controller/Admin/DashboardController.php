<?php

namespace App\Controller\Admin;

use App\Entity\ContactForm;
use App\Entity\FileProject;
use App\Entity\ImageHeader;
use App\Entity\ImageProject;
use App\Entity\Project;
use App\Entity\SliderGames;
use App\Entity\SliderHobbies;
use App\Repository\ContactFormRepository;
use App\Repository\ProjectRepository;
use App\Repository\UserRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    protected AdminUrlGenerator $adminUrlGenerator;
    protected UserRepository $userRepository;
    protected ProjectRepository $projectRepository;
    protected ContactFormRepository $formRepository;

    public function __construct(
        AdminUrlGenerator $adminUrlGenerator,
        UserRepository $userRepository,
        ProjectRepository $projectRepository,
        ContactFormRepository $formRepository,
    )
    {
        $this->adminUrlGenerator = $adminUrlGenerator;
        $this->userRepository = $userRepository;
        $this->projectRepository = $projectRepository;
        $this->formRepository = $formRepository;
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('bundles/EasyAdminBundle/welcome.html.twig', [
            'user' => $this->userRepository->findOneBy(['id' => 1]),
            'projectCount' => $this->projectRepository->getCountProjectClassic(),
            'favoriteProjectCount' => $this->projectRepository->getCountProjectFavorite(),
            'totalProject' => $this->projectRepository->getCountAllProject(),
            'totalUnreadContact' => $this->formRepository->getContactFormUnread(),
            'totalReadContact' => $this->formRepository->getContactFormRead(),
            'totalContact' => $this->formRepository->getCountContactForm(),
        ]);
//        $url = $this->adminUrlGenerator->setController(ProjectCrudController::class)->generateUrl();
//        return $this->redirect($url);
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
            MenuItem::linkToCrud('Show Project', 'fas fa-eye', Project::class),
            MenuItem::linkToCrud('Show Image Project', 'fas fa-eye', ImageProject::class),
            MenuItem::linkToCrud('Show file project', 'fas fa-eye', FileProject::class)
        ]);

        yield MenuItem::section('Home Page');
        yield MenuItem::subMenu('Action', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Show Image Header', 'fas fa-eye', ImageHeader::class),
            MenuItem::linkToCrud('Show Slider Games', 'fas fa-eye', SliderGames::class),
            MenuItem::linkToCrud('Show Slider Hobbies', 'fas fa-eye', SliderHobbies::class)
        ]);

        yield MenuItem::section('Contact');
        yield MenuItem::linkToCrud('Show contact request', 'fas fa-eye', ContactForm::class);
    }
}
