<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 */
class Patient extends Utilisateur
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

    private $tel;

    /**
     * @ORM\Column(type="integer")
     */
    private $numSecu;

    /**
     * @ORM\Column(type="string", length=70)
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

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getNumSecu(): ?int
    {
        return $this->numSecu;
    }

    public function setNumSecu(int $numSecu): self
    {
        $this->numSecu = $numSecu;

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
            $desRDV->setUnPatient($this);
        }

        return $this;
    }

    public function removeDesRDV(RDV $desRDV): self
    {
        if ($this->desRDV->removeElement($desRDV)) {
            // set the owning side to null (unless already changed)
            if ($desRDV->getUnPatient() === $this) {
                $desRDV->setUnPatient(null);
            }
        }

        return $this;
    }
}
