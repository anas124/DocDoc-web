<?php

namespace App\Entity;

use App\Repository\FourniseurServiceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FourniseurServiceRepository::class)
 */
class FourniseurService
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $fourniseur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contact;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gouvernorat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $delegation;

    /**
     * @ORM\ManyToOne(targetEntity=categorieService::class, inversedBy="fourniseurServices")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $maplocation;

    /**
     * @ORM\ManyToOne(targetEntity=Service::class, inversedBy="fourniseursservice")
     */
    private $service;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFourniseur(): ?string
    {
        return $this->fourniseur;
    }

    public function setFourniseur(string $fourniseur): self
    {
        $this->fourniseur = $fourniseur;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getGouvernorat(): ?string
    {
        return $this->gouvernorat;
    }

    public function setGouvernorat(string $gouvernorat): self
    {
        $this->gouvernorat = $gouvernorat;

        return $this;
    }

    public function getDelegation(): ?string
    {
        return $this->delegation;
    }

    public function setDelegation(string $delegation): self
    {
        $this->delegation = $delegation;

        return $this;
    }

    public function getCategorie(): ?categorieService
    {
        return $this->categorie;
    }

    public function setCategorie(?categorieService $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getMaplocation(): ?string
    {
        return $this->maplocation;
    }

    public function setMaplocation(?string $maplocation): self
    {
        $this->maplocation = $maplocation;

        return $this;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): self
    {
        $this->service = $service;

        return $this;
    }



}
