<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AssistanteMaternelleRepository")
 */
class AssistanteMaternelle
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
     * @ORM\Column(type="string", length=255)
     */
    private $telephone1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephone2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adressePostale;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomJeuneFille;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ParentFacilitateur", mappedBy="assistanteMaternelle")
     */
    private $parentFacilitateurs;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\SessionFormation", mappedBy="participants")
     */
    private $sessionFormations;

    public function __construct()
    {
        $this->parentFacilitateurs = new ArrayCollection();
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

    public function getTelephone1(): ?string
    {
        return $this->telephone1;
    }

    public function setTelephone1(string $telephone1): self
    {
        $this->telephone1 = $telephone1;

        return $this;
    }

    public function getTelephone2(): ?string
    {
        return $this->telephone2;
    }

    public function setTelephone2(?string $telephone2): self
    {
        $this->telephone2 = $telephone2;

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

    public function getAdressePostale(): ?string
    {
        return $this->adressePostale;
    }

    public function setAdressePostale(string $adressePostale): self
    {
        $this->adressePostale = $adressePostale;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getNomJeuneFille(): ?string
    {
        return $this->nomJeuneFille;
    }

    public function setNomJeuneFille(string $nomJeuneFille): self
    {
        $this->nomJeuneFille = $nomJeuneFille;

        return $this;
    }

    /**
     * @return Collection|ParentFacilitateur[]
     */
    public function getParentFacilitateurs(): Collection
    {
        return $this->parentFacilitateurs;
    }

    public function addParentFacilitateur(ParentFacilitateur $parentFacilitateur): self
    {
        if (!$this->parentFacilitateurs->contains($parentFacilitateur)) {
            $this->parentFacilitateurs[] = $parentFacilitateur;
            $parentFacilitateur->setAssistanteMaternelle($this);
        }

        return $this;
    }

    public function removeParentFacilitateur(ParentFacilitateur $parentFacilitateur): self
    {
        if ($this->parentFacilitateurs->contains($parentFacilitateur)) {
            $this->parentFacilitateurs->removeElement($parentFacilitateur);
            // set the owning side to null (unless already changed)
            if ($parentFacilitateur->getAssistanteMaternelle() === $this) {
                $parentFacilitateur->setAssistanteMaternelle(null);
            }
        }

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
            $sessionFormation->addParticipant($this);
        }

        return $this;
    }

    public function removeSessionFormation(SessionFormation $sessionFormation): self
    {
        if ($this->sessionFormations->contains($sessionFormation)) {
            $this->sessionFormations->removeElement($sessionFormation);
            $sessionFormation->removeParticipant($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getPrenom()." ".$this->getNom();
    }
}
