<?php

namespace App\Entity;

use App\Repository\CompteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ApiResource(
 * normalizationContext={"groups"={"compte:read"}},
 * denormalizationContext={"groups"={"compte:write"}}
 * )
 * @ApiFilter(SearchFilter::class, properties={"numCompte": "exact"})
 * @ORM\Entity(repositoryClass=CompteRepository::class)
 */
class Compte
{
    /**
     * @Groups("read")
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * 
     * @Groups("compte:read")
     */
    private $id;

    /**
     * @Groups({"compte:read", "compte:write"})
     * @ORM\Column(type="string", length=255)
     */
    private $numAgence;

    /**
     * @Groups({"compte:read", "compte:write"})
     * @ORM\Column(type="string", length=255)
     */
    private $numCompte;

    /**
     * @Groups("compte:write")
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rib;

    /**
     * @Groups({"compte:read", "compte:write"})
     * @ORM\Column(type="integer")
     */
    private $solde;

    /**
     * @Groups({"compte:read", "compte:write"})
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDebut;

    /**
     * @Groups({"compte:read", "compte:write"})
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateFin;

    /**
     * @Groups({"compte:read", "compte:write"})
     * @ORM\ManyToOne(targetEntity=Typecompte::class, inversedBy="comptes")
     */
    private $typecompte;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="comptes")
     */
    private $user;

    /**
     * @Groups({"compte:read", "compte:write"})
     * @ORM\OneToMany(targetEntity=Depot::class, mappedBy="comptes")
     */
    private $depots;

    /**
     * @Groups({"compte:read", "compte:write"})
     * @ORM\OneToMany(targetEntity=Retrait::class, mappedBy="comptes")
     */
    private $retraits;

    public function __construct()
    {
        $this->operations = new ArrayCollection();
        $this->depots = new ArrayCollection();
        $this->retraits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumAgence(): ?string
    {
        return $this->numAgence;
    }

    public function setNumAgence(string $numAgence): self
    {
        $this->numAgence = $numAgence;

        return $this;
    }

    public function getNumCompte(): ?string
    {
        return $this->numCompte;
    }

    public function setNumCompte(string $numCompte): self
    {
        $this->numCompte = $numCompte;

        return $this;
    }

    public function getRib(): ?string
    {
        return $this->rib;
    }

    public function setRib(?string $rib): self
    {
        $this->rib = $rib;

        return $this;
    }

    public function getSolde(): ?int
    {
        return $this->solde;
    }
    
    public function setSolde(int $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getTypecompte(): ?Typecompte
    {
        return $this->typecompte;
    }

    public function setTypecompte(?Typecompte $typecompte): self
    {
        $this->typecompte = $typecompte;

        return $this;
    }

    /**
     * @return Collection|Depot[]
     */
    public function getDepots(): Collection
    {
        return $this->depots;
    }

    public function addDepot(Depot $depot): self
    {
        if (!$this->depots->contains($depot)) {
            $this->depots[] = $depot;
            $depot->setComptes($this);
        }

        return $this;
    }

    public function removeDepot(Depot $depot): self
    {
        if ($this->depots->contains($depot)) {
            $this->depots->removeElement($depot);
            // set the owning side to null (unless already changed)
            if ($depot->getComptes() === $this) {
                $depot->setComptes(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Retrait[]
     */
    public function getRetraits(): Collection
    {
        return $this->retraits;
    }

    public function addRetrait(Retrait $retrait): self
    {
        if (!$this->retraits->contains($retrait)) {
            $this->retraits[] = $retrait;
            $retrait->setComptes($this);
        }

        return $this;
    }

    public function removeRetrait(Retrait $retrait): self
    {
        if ($this->retraits->contains($retrait)) {
            $this->retraits->removeElement($retrait);
            // set the owning side to null (unless already changed)
            if ($retrait->getComptes() === $this) {
                $retrait->setComptes(null);
            }
        }

        return $this;
    }
}
