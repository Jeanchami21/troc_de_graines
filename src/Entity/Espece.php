<?php

namespace App\Entity;

use App\Repository\EspeceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EspeceRepository::class)
 */
class Espece
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_commum;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom_binominal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $genre;

    /**
     * @ORM\ManyToOne(targetEntity=famille::class, inversedBy="especes")
     */
    private $famille;

    /**
     * @ORM\OneToMany(targetEntity=Variete::class, mappedBy="espece")
     */
    private $varietes;

    public function __construct()
    {
        $this->varietes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCommum(): ?string
    {
        return $this->nom_commum;
    }

    public function setNomCommum(string $nom_commum): self
    {
        $this->nom_commum = $nom_commum;

        return $this;
    }

    public function getNomBinominal(): ?string
    {
        return $this->nom_binominal;
    }

    public function setNomBinominal(?string $nom_binominal): self
    {
        $this->nom_binominal = $nom_binominal;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(?string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getFamille(): ?famille
    {
        return $this->famille;
    }

    public function setFamille(?famille $famille): self
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * @return Collection|Variete[]
     */
    public function getVarietes(): Collection
    {
        return $this->varietes;
    }

    public function addVariete(Variete $variete): self
    {
        if (!$this->varietes->contains($variete)) {
            $this->varietes[] = $variete;
            $variete->setEspece($this);
        }

        return $this;
    }

    public function removeVariete(Variete $variete): self
    {
        if ($this->varietes->contains($variete)) {
            $this->varietes->removeElement($variete);
            // set the owning side to null (unless already changed)
            if ($variete->getEspece() === $this) {
                $variete->setEspece(null);
            }
        }

        return $this;
    }
}
