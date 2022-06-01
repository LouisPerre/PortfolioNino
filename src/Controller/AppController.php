<?php

namespace App\Controller;

use App\Entity\Project;
use App\Form\ContactFormType;
use App\Repository\ImageHeaderRepository;
use App\Repository\ImageProjectRepository;
use App\Repository\ProjectRepository;
use App\Repository\SliderGamesRepository;
use App\Repository\SliderHobbiesRepository;
use App\Service\CheckFormContactService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class AppController extends AbstractController
{
    #[Route('/', name: 'app_app')]
    public function index(
        ImageHeaderRepository $headerRepository,
        ProjectRepository $projectRepository,
        SliderHobbiesRepository $hobbiesRepository,
        SliderGamesRepository $gamesRepository,
        Request $request,
        CheckFormContactService $checkFormContact
    ): Response
    {
        $contactForm = $this->createForm(ContactFormType::class);
        $contactForm->handleRequest($request);
        if ($contactForm->isSubmitted() && $contactForm->isValid())
        {
//            var_dump(gettype($contactForm));
            $checkFormContact->checkFormValidity($contactForm);
        }

        return $this->render('app/index.html.twig', [
            'imgsHeader' => $headerRepository->findAll(),
            'allFavorites' => $projectRepository->getByFavorite(true),
            'allProjects' => $projectRepository->getByFavorite(false),
            'sliderHobbies' => $hobbiesRepository->findAll(),
            'sliderGames' => $gamesRepository->findAll(),
            'contactForm' => $contactForm->createView()
        ]);
    }

    #[Route('/{id}', name: 'app_project')]
    public function video(
        $id,
        ProjectRepository $projectRepository,
        ImageProjectRepository $imageProjectRepository
    ): Response
    {
        $project = $projectRepository->findOneBy(['id' => $id]);
        return $this->render('app/video.html.twig', [
            'project' => $project,
            'sliderProject' => $imageProjectRepository->findBy(['project' => $id])
        ]);
    }

    public function nav(
        Request $request
    )
    {

        return $this->render('partial/nav.html.twig', [
        ]);
    }
}
