<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParentFacilitateurRepository")
 */
class ParentFacilitateur
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\AssistanteMaternelle", inversedBy="parentFacilitateurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $assistanteMaternelle;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\SessionFormation", mappedBy="parentsFacilitateurs")
     */
    private $sessionFormations;

    public function __construct()
    {
        $this->sessionFormations = new ArrayCollection();
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

    public function getAssistanteMaternelle(): ?AssistanteMaternelle
    {
        return $this->assistanteMaternelle;
    }

    public function setAssistanteMaternelle(?AssistanteMaternelle $assistanteMaternelle): self
    {
        $this->assistanteMaternelle = $assistanteMaternelle;

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
            $sessionFormation->addParentsFacilitateur($this);
        }

        return $this;
    }

    public function removeSessionFormation(SessionFormation $sessionFormation): self
    {
        if ($this->sessionFormations->contains($sessionFormation)) {
            $this->sessionFormations->removeElement($sessionFormation);
            $sessionFormation->removeParentsFacilitateur($this);
        }

        return $this;
    }
}
