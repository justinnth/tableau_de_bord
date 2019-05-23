<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SessionFormationRepository")
 */
class SessionFormation
{
    use TimestampableEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $beginAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $endAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Formation", inversedBy="sessionFormations")
     */
    private $formation;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Formateur", inversedBy="sessionFormations")
     */
    private $formateurs;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\AssistanteMaternelle", inversedBy="sessionFormations")
     */
    private $participants;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ParentFacilitateur", inversedBy="sessionFormations")
     */
    private $parentsFacilitateurs;

    public function __construct()
    {
        $this->formateurs = new ArrayCollection();
        $this->participants = new ArrayCollection();
        $this->parentsFacilitateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBeginAt(): ?\DateTimeInterface
    {
        return $this->beginAt;
    }

    public function setBeginAt(\DateTimeInterface $beginAt): self
    {
        $this->beginAt = $beginAt;

        return $this;
    }

    public function getEndAt(): ?\DateTimeInterface
    {
        return $this->endAt;
    }

    public function setEndAt(\DateTimeInterface $endAt): self
    {
        $this->endAt = $endAt;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    public function setFormation(?Formation $formation): self
    {
        $this->formation = $formation;

        return $this;
    }

    /**
     * @return Collection|Formateur[]
     */
    public function getFormateurs(): Collection
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
     * @return Collection|AssistanteMaternelle[]
     */
    public function getParticipants(): Collection
    {
        return $this->participants;
    }

    public function addParticipant(AssistanteMaternelle $participant): self
    {
        if (!$this->participants->contains($participant)) {
            $this->participants[] = $participant;
        }

        return $this;
    }

    public function removeParticipant(AssistanteMaternelle $participant): self
    {
        if ($this->participants->contains($participant)) {
            $this->participants->removeElement($participant);
        }

        return $this;
    }

    /**
     * @return Collection|ParentFacilitateur[]
     */
    public function getParentsFacilitateurs(): Collection
    {
        return $this->parentsFacilitateurs;
    }

    public function addParentsFacilitateur(ParentFacilitateur $parentsFacilitateur): self
    {
        if (!$this->parentsFacilitateurs->contains($parentsFacilitateur)) {
            $this->parentsFacilitateurs[] = $parentsFacilitateur;
        }

        return $this;
    }

    public function removeParentsFacilitateur(ParentFacilitateur $parentsFacilitateur): self
    {
        if ($this->parentsFacilitateurs->contains($parentsFacilitateur)) {
            $this->parentsFacilitateurs->removeElement($parentsFacilitateur);
        }

        return $this;
    }
}
