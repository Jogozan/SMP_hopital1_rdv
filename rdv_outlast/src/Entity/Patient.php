<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 */
class Patient
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=65)
     */
    private $mdp;

    /**
     * @ORM\Column(type="integer")
     */
    private $tel;

    /**
     * @ORM\Column(type="integer")
     */
    private $numSecu;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $mail;

    /**
     * @ORM\OneToMany(targetEntity=RDV::class, mappedBy="unPatient")
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

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
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

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

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
