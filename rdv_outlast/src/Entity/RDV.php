<?php

namespace App\Entity;

use App\Repository\RDVRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RDVRepository::class)
 */
class RDV
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="time")
     */
    private $heureDeb;

    /**
     * @ORM\Column(type="time")
     */
    private $heureFin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="desRDV")
     */
    private $unPatient;

    /**
     * @ORM\ManyToOne(targetEntity=Medecin::class, inversedBy="desRDV")
     */
    private $unMedecin;

    /**
     * @ORM\ManyToOne(targetEntity=Assistant::class, inversedBy="desRDV")
     */
    private $unAssistant;

 

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $ok;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHeureDeb(): ?\DateTimeInterface
    {
        return $this->heureDeb;
    }

    public function setHeureDeb(\DateTimeInterface $heureDeb): self
    {
        $this->heureDeb = $heureDeb;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->heureFin;
    }

    public function setHeureFin(\DateTimeInterface $heureFin): self
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getUnPatient(): ?Patient
    {
        return $this->unPatient;
    }

    public function setUnPatient(?Patient $unPatient): self
    {
        $this->unPatient = $unPatient;

        return $this;
    }

    public function getUnMedecin(): ?Medecin
    {
        return $this->unMedecin;
    }

    public function setUnMedecin(?Medecin $unMedecin): self
    {
        $this->unMedecin = $unMedecin;

        return $this;
    }

    public function getUnAssistant(): ?Assistant
    {
        return $this->unAssistant;
    }

    public function setUnAssistant(?Assistant $unAssistant): self
    {
        $this->unAssistant = $unAssistant;

        return $this;
    }

    

    public function getOk(): ?bool
    {
        return $this->ok;
    }

    public function setOk(?bool $ok): self
    {
        $this->ok = $ok;

        return $this;
    }
}
