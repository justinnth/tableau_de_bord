<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormationRepository")
 */
class Formation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $titre;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duree;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $reference;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $pedagogie;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $publicVise;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $formateur;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $prerequis;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $lieu;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cpf;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $lien;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
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

    public function getFormateur(): ?string
    {
        return $this->formateur;
    }

    public function setFormateur(string $formateur): self
    {
        $this->formateur = $formateur;

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

}
