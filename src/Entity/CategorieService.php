<?php

namespace App\Entity;

use App\Repository\CategorieServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CategorieServiceRepository::class)
 */
class CategorieService
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "libelle must be at least {{ limit }} characters long",
     *      maxMessage = "libelle cannot be longer than {{ limit }} characters",
     *      allowEmptyString = false
     * )
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *      min = 20,
     *      max = 100,
     *      minMessage = "the description must be at least {{ limit }} characters long",
     *      maxMessage = "the description cannot be longer than {{ limit }} characters",
     *      allowEmptyString = false
     * )
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=Service::class, mappedBy="categorie")
     */
    private $services;

    /**
     * @ORM\OneToMany(targetEntity=FourniseurService::class, mappedBy="categorie")
     */
    private $fourniseurServices;

    public function __construct()
    {
        $this->services = new ArrayCollection();
        $this->fourniseurServices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Service[]
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(Service $service): self
    {
        if (!$this->services->contains($service)) {
            $this->services[] = $service;
            $service->setCategorie($this);
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        if ($this->services->removeElement($service)) {
            // set the owning side to null (unless already changed)
            if ($service->getCategorie() === $this) {
                $service->setCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|FourniseurService[]
     */
    public function getFourniseurServices(): Collection
    {
        return $this->fourniseurServices;
    }

    public function addFourniseurService(FourniseurService $fourniseurService): self
    {
        if (!$this->fourniseurServices->contains($fourniseurService)) {
            $this->fourniseurServices[] = $fourniseurService;
            $fourniseurService->setCategorie($this);
        }

        return $this;
    }

    public function removeFourniseurService(FourniseurService $fourniseurService): self
    {
        if ($this->fourniseurServices->removeElement($fourniseurService)) {
            // set the owning side to null (unless already changed)
            if ($fourniseurService->getCategorie() === $this) {
                $fourniseurService->setCategorie(null);
            }
        }

        return $this;
    }
}
