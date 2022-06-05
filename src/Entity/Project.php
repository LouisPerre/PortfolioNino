<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $title;

    #[ORM\Column(type: 'string', length: 255)]
    private $imageHighlight;

    #[ORM\Column(type: 'date')]
    private $startDate;

    #[ORM\Column(type: 'string', length: 255)]
    private $duration;

    #[ORM\Column(type: 'integer')]
    private $people;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
    private $youtubeVideo;

    #[ORM\OneToMany(mappedBy: 'project', targetEntity: ImageHeader::class)]
    private $imgSlider;

    #[ORM\Column(type: 'boolean')]
    private $isFavorite;

    #[ORM\OneToMany(mappedBy: 'project', targetEntity: ImageProject::class, cascade: ['remove'])]
    private $imageSlider;

    #[ORM\Column(type: 'string', length: 25, nullable: true)]
    private $roles;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $event;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $theme;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $linkItch;

    #[ORM\Column(type: 'string', length: 255)]
    private $technologie;

    #[ORM\Column(type: 'text')]
    private $context;

    #[ORM\Column(type: 'array', nullable: true)]
    private $files = [];

    #[ORM\OneToMany(mappedBy: 'project', targetEntity: FileProject::class, orphanRemoval: true)]
    private $fileProjects;

    public function __construct()
    {
        $this->imgSlider = new ArrayCollection();
        $this->imageSlider = new ArrayCollection();
        $this->fileProjects = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getImageHighlight(): ?string
    {
        return $this->imageHighlight;
    }

    public function setImageHighlight(string $imageHighlight): self
    {
        $this->imageHighlight = $imageHighlight;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getPeople(): ?int
    {
        return $this->people;
    }

    public function setPeople(int $people): self
    {
        $this->people = $people;

        return $this;
    }

    public function getDescription(): ?string
    {
        return str_replace( '&nbsp;', "", strip_tags($this->description));
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getYoutubeVideo(): ?string
    {
        return $this->youtubeVideo;
    }

    public function setYoutubeVideo(string $youtubeVideo): self
    {
        $this->youtubeVideo = $youtubeVideo;

        return $this;
    }

    /**
     * @return Collection<int, ImageHeader>
     */
    public function getImgSlider(): Collection
    {
        return $this->imgSlider;
    }

    public function addImgSlider(ImageHeader $imgSlider): self
    {
        if (!$this->imgSlider->contains($imgSlider)) {
            $this->imgSlider[] = $imgSlider;
            $imgSlider->setProject($this);
        }

        return $this;
    }

    public function removeImgSlider(ImageHeader $imgSlider): self
    {
        if ($this->imgSlider->removeElement($imgSlider)) {
            // set the owning side to null (unless already changed)
            if ($imgSlider->getProject() === $this) {
                $imgSlider->setProject(null);
            }
        }

        return $this;
    }

    public function isIsFavorite(): ?bool
    {
        return $this->isFavorite;
    }

    public function setIsFavorite(bool $isFavorite): self
    {
        $this->isFavorite = $isFavorite;

        return $this;
    }

    /**
     * @return Collection<int, ImageProject>
     */
    public function getImageSlider(): Collection
    {
        return $this->imageSlider;
    }

    public function addImageSlider(ImageProject $imageSlider): self
    {
        if (!$this->imageSlider->contains($imageSlider)) {
            $this->imageSlider[] = $imageSlider;
            $imageSlider->setProject($this);
        }

        return $this;
    }

    public function removeImageSlider(ImageProject $imageSlider): self
    {
        if ($this->imageSlider->removeElement($imageSlider)) {
            // set the owning side to null (unless already changed)
            if ($imageSlider->getProject() === $this) {
                $imageSlider->setProject(null);
            }
        }

        return $this;
    }

    public function getRoles(): ?string
    {
        return $this->roles;
    }

    public function setRoles(?string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getEvent(): ?string
    {
        return $this->event;
    }

    public function setEvent(?string $event): self
    {
        $this->event = $event;

        return $this;
    }

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(?string $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    public function getLinkItch(): ?string
    {
        return $this->linkItch;
    }

    public function setLinkItch(?string $linkItch): self
    {
        $this->linkItch = $linkItch;

        return $this;
    }

    public function getTechnologie(): ?string
    {
        return $this->technologie;
    }

    public function setTechnologie(string $technologie): self
    {
        $this->technologie = $technologie;

        return $this;
    }

    public function getContext(): ?string
    {
        return str_replace('&nbsp;', ' ', strip_tags($this->context));
    }

    public function setContext(string $context): self
    {
        $this->context = $context;

        return $this;
    }

    public function getFiles(): ?array
    {
        return $this->files;
    }

    public function setFiles(?array $files): self
    {
        $this->files = $files;

        return $this;
    }

    /**
     * @return Collection<int, FileProject>
     */
    public function getFileProjects(): Collection
    {
        return $this->fileProjects;
    }

    public function addFileProject(FileProject $fileProject): self
    {
        if (!$this->fileProjects->contains($fileProject)) {
            $this->fileProjects[] = $fileProject;
            $fileProject->setProject($this);
        }

        return $this;
    }

    public function removeFileProject(FileProject $fileProject): self
    {
        if ($this->fileProjects->removeElement($fileProject)) {
            // set the owning side to null (unless already changed)
            if ($fileProject->getProject() === $this) {
                $fileProject->setProject(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getTitle();
    }
}
