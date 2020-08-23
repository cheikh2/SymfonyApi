<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MoralRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=MoralRepository::class)
 */
class Moral
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomEmpl;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ninea;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $raisonSocial;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adressEmpl;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="morals")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Physique::class, mappedBy="moral")
     */
    private $physiques;

    /**
     * @ORM\OneToMany(targetEntity=Compte::class, mappedBy="moral")
     */
    private $comptes;

    public function __construct()
    {
        $this->physiques = new ArrayCollection();
        $this->comptes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEmpl(): ?string
    {
        return $this->nomEmpl;
    }

    public function setNomEmpl(string $nomEmpl): self
    {
        $this->nomEmpl = $nomEmpl;

        return $this;
    }

    public function getNinea(): ?string
    {
        return $this->ninea;
    }

    public function setNinea(?string $ninea): self
    {
        $this->ninea = $ninea;

        return $this;
    }

    public function getRc(): ?string
    {
        return $this->rc;
    }

    public function setRc(?string $rc): self
    {
        $this->rc = $rc;

        return $this;
    }

    public function getRaisonSocial(): ?string
    {
        return $this->raisonSocial;
    }

    public function setRaisonSocial(?string $raisonSocial): self
    {
        $this->raisonSocial = $raisonSocial;

        return $this;
    }

    public function getAdressEmpl(): ?string
    {
        return $this->adressEmpl;
    }

    public function setAdressEmpl(?string $adressEmpl): self
    {
        $this->adressEmpl = $adressEmpl;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Physique[]
     */
    public function getPhysiques(): Collection
    {
        return $this->physiques;
    }

    public function addPhysique(Physique $physique): self
    {
        if (!$this->physiques->contains($physique)) {
            $this->physiques[] = $physique;
            $physique->setMoral($this);
        }

        return $this;
    }

    public function removePhysique(Physique $physique): self
    {
        if ($this->physiques->contains($physique)) {
            $this->physiques->removeElement($physique);
            // set the owning side to null (unless already changed)
            if ($physique->getMoral() === $this) {
                $physique->setMoral(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Compte[]
     */
    public function getComptes(): Collection
    {
        return $this->comptes;
    }

    public function addCompte(Compte $compte): self
    {
        if (!$this->comptes->contains($compte)) {
            $this->comptes[] = $compte;
            $compte->setMoral($this);
        }

        return $this;
    }

    public function removeCompte(Compte $compte): self
    {
        if ($this->comptes->contains($compte)) {
            $this->comptes->removeElement($compte);
            // set the owning side to null (unless already changed)
            if ($compte->getMoral() === $this) {
                $compte->setMoral(null);
            }
        }

        return $this;
    }
}
