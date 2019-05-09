<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormateurRepository")
 */
class Formateur
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
     * @ORM\Column(type="date")
     */
    private $date_de_naissance;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $mail;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $meilleur_diplome;

    /**
     * @ORM\Column(type="boolean")
     */
    private $salarie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fonction_actuelle;

    /**
     * @ORM\Column(type="text")
     */
    private $domaine_expertise;

    /**
     * @ORM\Column(type="text")
     */
    private $mode_acquisition;

    /**
     * @ORM\Column(type="text")
     */
    private $type_formations;

    /**
     * @ORM\Column(type="array")
     */
    private $zone_execution = [];

    /**
     * @ORM\Column(type="array")
     */
    private $formation_iperia = [];

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EvenementPlanning", mappedBy="formateur")
     */
    private $evenementPlannings;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Formation", mappedBy="formateurs")
     */
    private $formations;

    public function __construct()
    {
        $this->evenementPlannings = new ArrayCollection();
        $this->formations = new ArrayCollection();
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

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->date_de_naissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $date_de_naissance): self
    {
        $this->date_de_naissance = $date_de_naissance;

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

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getMeilleurDiplome(): ?string
    {
        return $this->meilleur_diplome;
    }

    public function setMeilleurDiplome(string $meilleur_diplome): self
    {
        $this->meilleur_diplome = $meilleur_diplome;

        return $this;
    }

    public function getSalarie(): ?bool
    {
        return $this->salarie;
    }

    public function setSalarie(bool $salarie): self
    {
        $this->salarie = $salarie;

        return $this;
    }

    public function getFonctionActuelle(): ?string
    {
        return $this->fonction_actuelle;
    }

    public function setFonctionActuelle(string $fonction_actuelle): self
    {
        $this->fonction_actuelle = $fonction_actuelle;

        return $this;
    }

    public function getDomaineExpertise(): ?string
    {
        return $this->domaine_expertise;
    }

    public function setDomaineExpertise(string $domaine_expertise): self
    {
        $this->domaine_expertise = $domaine_expertise;

        return $this;
    }

    public function getModeAcquisition(): ?string
    {
        return $this->mode_acquisition;
    }

    public function setModeAcquisition(string $mode_acquisition): self
    {
        $this->mode_acquisition = $mode_acquisition;

        return $this;
    }

    public function getTypeFormations(): ?string
    {
        return $this->type_formations;
    }

    public function setTypeFormations(string $type_formations): self
    {
        $this->type_formations = $type_formations;

        return $this;
    }

    public function getZoneExecution(): ?array
    {
        return $this->zone_execution;
    }

    public function setZoneExecution(array $zone_execution): self
    {
        $this->zone_execution = $zone_execution;

        return $this;
    }

    public function getFormationIperia(): ?array
    {
        return $this->formation_iperia;
    }

    public function setFormationIperia(array $formation_iperia): self
    {
        $this->formation_iperia = $formation_iperia;

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
            $evenementPlanning->setFormateur($this);
        }

        return $this;
    }

    public function removeEvenementPlanning(EvenementPlanning $evenementPlanning): self
    {
        if ($this->evenementPlannings->contains($evenementPlanning)) {
            $this->evenementPlannings->removeElement($evenementPlanning);
            // set the owning side to null (unless already changed)
            if ($evenementPlanning->getFormateur() === $this) {
                $evenementPlanning->setFormateur(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getNom()." ".$this->getPrenom();
    }

    /**
     * @return Collection|Formation[]
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(Formation $formation): self
    {
        if (!$this->formations->contains($formation)) {
            $this->formations[] = $formation;
            $formation->addFormateur($this);
        }

        return $this;
    }

    public function removeFormation(Formation $formation): self
    {
        if ($this->formations->contains($formation)) {
            $this->formations->removeElement($formation);
            $formation->removeFormateur($this);
        }

        return $this;
    }
}
