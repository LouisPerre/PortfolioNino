<?php

namespace App\DataFixtures;

use App\Entity\SliderGames;
use App\Entity\SliderHobbies;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SlidersAboutMe extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 3; $i++) {
            $sliderHobby = new SliderHobbies();
            $sliderHobby->setPath('hobby' . $i . '.jpeg');

            $manager->persist($sliderHobby);
        }
        $manager->flush();

        for ($i = 0; $i < 3; $i++)
        {
            $sliderGames = new SliderGames();
            $sliderGames->setPath('game' . $i . '.jpeg');

            $manager->persist($sliderGames);
        }
        $manager->flush();
    }
}
