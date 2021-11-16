<?php

namespace App\Entity;

use App\Repository\MedecinRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedecinRepository::class)
 */
class Medecin
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $desRDV;

    public function __construct()
    {
        $this->desRDV = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return Collection|RDV[]
     */
    public function getDesRDV(): Collection
    {
        return $this->desRDV;
    }

    public function addDesRDV(RDV $desRDV): self
    {
        if (!$this->desRDV->contains($desRDV)) {
            $this->desRDV[] = $desRDV;
            $desRDV->setUnMedecin($this);
        }

        return $this;
    }

    public function removeDesRDV(RDV $desRDV): self
    {
        if ($this->desRDV->removeElement($desRDV)) {
            // set the owning side to null (unless already changed)
            if ($desRDV->getUnMedecin() === $this) {
                $desRDV->setUnMedecin(null);
            }
        }

        return $this;
    }
}
