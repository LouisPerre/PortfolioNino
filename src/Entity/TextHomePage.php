<?php

namespace App\Entity;

use App\Repository\TextHomePageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TextHomePageRepository::class)]
class TextHomePage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $textHobbies;

    #[ORM\Column(type: 'text')]
    private $textGames;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTextHobbies(): ?string
    {
        return strip_tags($this->textHobbies);
    }

    public function setTextHobbies(string $textHobbies): self
    {
        $this->textHobbies = $textHobbies;

        return $this;
    }

    public function getTextGames(): ?string
    {
        return strip_tags($this->textGames);
    }

    public function setTextGames(string $textGames): self
    {
        $this->textGames = $textGames;

        return $this;
    }
}
