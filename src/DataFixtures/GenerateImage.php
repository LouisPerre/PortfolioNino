<?php

namespace App\DataFixtures;

use App\Entity\ImageHeader;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GenerateImage extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 3; $i++)
        {
            $imageHeader = new ImageHeader();
            $imageHeader->setPath('car' . $i . '.jpeg');
            $imageHeader->setCreatedAt(new DateTime());
            $manager->persist($imageHeader);
        }
        $manager->flush();
    }
}
