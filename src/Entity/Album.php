<?php

namespace App\Entity;

use App\Entity\Artiste;
use App\Entity\Morceau;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AlbumRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: AlbumRepository::class)]
class Album
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy:"IDENTITY")]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $date = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\OneToMany(targetEntity: Morceau::class, mappedBy: 'album')]
    private Collection $morceau;

    #[ORM\ManyToOne(inversedBy: 'albums')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Artiste $artiste = null;

    #[ORM\ManyToMany(targetEntity: Style::class, mappedBy: 'albums')]
    private Collection $styles;

    public function __construct()
    {
        $this->morceau = new ArrayCollection();
        $this->styles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDate(): ?int
    {
        return $this->date;
    }

    public function setDate(int $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }


    /**
     * @return Collection<int, Morceau>
     */
    public function getMorceau(): Collection
    {
        return $this->morceau;
    }

    public function addMorceau(Morceau $morceau): static
    {
        if (!$this->morceau->contains($morceau)) {
            $this->morceau->add($morceau);
            $morceau->setAlbum($this);
        }

        return $this;
    }

    public function removeMorceau(Morceau $morceau): static
    {
        if ($this->morceau->removeElement($morceau)) {
            // set the owning side to null (unless already changed)
            if ($morceau->getAlbum() === $this) {
                $morceau->setAlbum(null);
            }
        }

        return $this;
    }

    public function getArtiste(): ?Artiste
    {
        return $this->artiste;
    }

    public function setArtiste(?Artiste $artiste): static
    {
        $this->artiste = $artiste;

        return $this;
    }

    /**
     * @return Collection<int, Style>
     */
    public function getStyles(): Collection
    {
        return $this->styles;
    }

    public function addStyle(Style $style): static
    {
        if (!$this->styles->contains($style)) {
            $this->styles->add($style);
            $style->addAlbum($this);
        }

        return $this;
    }

    public function removeStyle(Style $style): static
    {
        if ($this->styles->removeElement($style)) {
            $style->removeAlbum($this);
        }

        return $this;
    }
}
