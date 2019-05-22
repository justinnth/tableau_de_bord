<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormationRepository")
 */
class Formation
{
    use TimestampableEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duree;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reference;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pedagogie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $publicVise;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prerequis;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieu;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cpf;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lien;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facebook;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $trameARealiser;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $trameValiderIperia;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Formateur", inversedBy="formations")
     */
    private $formateurs;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numero_cpf;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $theme;

    /**
     * @ORM\Column(type="text", length=65535, nullable=true)
     */
    private $descriptif;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SessionFormation", mappedBy="formation")
     */
    private $sessionFormations;

    public function __construct()
    {
        $this->formateurs = new ArrayCollection();
        $this->evenementPlannings = new ArrayCollection();
        $this->sessionFormations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(?int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getPedagogie(): ?string
    {
        return $this->pedagogie;
    }

    public function setPedagogie(string $pedagogie): self
    {
        $this->pedagogie = $pedagogie;

        return $this;
    }

    public function getPublicVise(): ?string
    {
        return $this->publicVise;
    }

    public function setPublicVise(string $publicVise): self
    {
        $this->publicVise = $publicVise;

        return $this;
    }

    public function setformateurs(string $formateurs): self
    {
        $this->formateurs = $formateurs;

        return $this;
    }

    public function getPrerequis(): ?string
    {
        return $this->prerequis;
    }

    public function setPrerequis(string $prerequis): self
    {
        $this->prerequis = $prerequis;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getCpf(): ?bool
    {
        return $this->cpf;
    }

    public function setCpf(?bool $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(?string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): self
    {
        $this->facebook = $facebook;

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

    public function getTrameARealiser(): ?bool
    {
        return $this->trameARealiser;
    }

    public function setTrameARealiser(?bool $trameARealiser): self
    {
        $this->trameARealiser = $trameARealiser;

        return $this;
    }

    public function getTrameValiderIperia(): ?bool
    {
        return $this->trameValiderIperia;
    }

    public function setTrameValiderIperia(?bool $trameValiderIperia): self
    {
        $this->trameValiderIperia = $trameValiderIperia;

        return $this;
    }

    /**
     * @return Collection|Formateur[]
     */
    public function getformateurs(): Collection
    {
        return $this->formateurs;
    }

    public function addFormateur(Formateur $formateur): self
    {
        if (!$this->formateurs->contains($formateur)) {
            $this->formateurs[] = $formateur;
        }

        return $this;
    }

    public function removeFormateur(Formateur $formateur): self
    {
        if ($this->formateurs->contains($formateur)) {
            $this->formateurs->removeElement($formateur);
        }

        return $this;
    }

    /**
     * @return Collection|EvenementPlanning[]
     */
    public function getEvenementPlannings(): Collection
    {
        return $this->evenementPlannings;
    }

    public function addEvenementPlanning(EvenementPlanning $evenementPlanning): self
    {
        if (!$this->evenementPlannings->contains($evenementPlanning)) {
            $this->evenementPlannings[] = $evenementPlanning;
            $evenementPlanning->setFormation($this);
        }

        return $this;
    }

    public function removeEvenementPlanning(EvenementPlanning $evenementPlanning): self
    {
        if ($this->evenementPlannings->contains($evenementPlanning)) {
            $this->evenementPlannings->removeElement($evenementPlanning);
            // set the owning side to null (unless already changed)
            if ($evenementPlanning->getFormation() === $this) {
                $evenementPlanning->setFormation(null);
            }
        }

        return $this;
    }

    public function getNumeroCpf(): ?int
    {
        return $this->numero_cpf;
    }

    public function setNumeroCpf(?int $numero_cpf): self
    {
        $this->numero_cpf = $numero_cpf;

        return $this;
    }

    public function __toString()
    {
        return $this->getTitre();
    }

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(?string $descriptif): self
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    /**
     * @return Collection|SessionFormation[]
     */
    public function getSessionFormations(): Collection
    {
        return $this->sessionFormations;
    }

    public function addSessionFormation(SessionFormation $sessionFormation): self
    {
        if (!$this->sessionFormations->contains($sessionFormation)) {
            $this->sessionFormations[] = $sessionFormation;
            $sessionFormation->setFormation($this);
        }

        return $this;
    }

    public function removeSessionFormation(SessionFormation $sessionFormation): self
    {
        if ($this->sessionFormations->contains($sessionFormation)) {
            $this->sessionFormations->removeElement($sessionFormation);
            // set the owning side to null (unless already changed)
            if ($sessionFormation->getFormation() === $this) {
                $sessionFormation->setFormation(null);
            }
        }

        return $this;
    }

}
