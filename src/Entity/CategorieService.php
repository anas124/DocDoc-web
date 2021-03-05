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
      * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="le champs libelle ne doit pas commancer par un chiffre ")
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *      min = 10,
     *      max = 150,
     *      minMessage = "déscription doit avoir ou minimun 20 caractérs ",
     *      maxMessage = "déscription doit comporte 100 caractéres"
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
