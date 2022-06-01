<?php

namespace App\DataFixtures;

use App\Entity\ImageProject;
use App\Entity\Project;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GenerateProject extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i <= 15; $i++)
        {
            $project = new Project();
            $project->setTitle('Nouveau projet unity : ' . $i);
            $project->setDuration($i . ' month');
            $project->setIsFavorite(false);
            $project->setPeople($i + 1);
            $project->setStartDate(new DateTime());
            $project->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eu lectus metus. Vivamus ac magna ex. Ut justo neque, malesuada vel aliquet aliquam, fermentum at magna. Suspendisse at magna leo. Morbi tempus mollis nibh vel laoreet. Quisque mattis massa quis nisi blandit, at interdum turpis sodales. Phasellus ut rhoncus libero. Donec rutrum laoreet egestas. Praesent at libero congue, aliquet lorem bibendum, rhoncus ligula. In sed magna sed risus dictum porta. Curabitur pretium tellus aliquam, sagittis.');
            $project->setImageHighlight('project1.jpeg');
            $project->setYoutubeVideo('https://www.youtube.com/watch?v=iCzh4bV1dAs');
            $project->setRoles('CDP');
            $project->setEvent('BAP');
            $project->setTheme('Post Apo');

            $manager->persist($project);
        }
        $manager->flush();

        $projectRepo = $manager->getRepository(Project::class);
        $projectRepo = $projectRepo->findAll();

        for ($i = 0; $i <= 40; $i++)
        {
            $projectKey = rand(0, (count($projectRepo) - 1));
            $imageProject = new ImageProject();
            $imageProject->setPath('projectSlider' . rand(0, 2) . '.jpeg');
            $imageProject->setProject($projectRepo[$projectKey]);
            $manager->persist($imageProject);
        }
        $manager->flush();

    }
}
