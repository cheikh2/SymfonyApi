<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RetraitRepository;
use App\Controller\RetraitController;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 * collectionOperations={
 *     "GET"={
 *               
*          },
*        "POST"={
*            "controller"=RetraitController::class,
*        }
* 
*     }
* )
 * @ORM\Entity(repositoryClass=RetraitRepository::class)
 */
class Retrait
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups("compte:read")
     * @ORM\Column(type="integer")
     */
    private $montant;

    /**
     * @Groups("compte:read")
     * @ORM\Column(type="datetime")
     */
    private $dateRetrait;

    /**
     * @ORM\ManyToOne(targetEntity=Compte::class, inversedBy="retraits")
     */
    private $comptes;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="retraits")
     */
    private $user;

    public function __construct()
    {
        $this->dateRetrait = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDateRetrait(): ?\DateTimeInterface
    {
        return $this->dateRetrait;
    }

    public function setDateRetrait(\DateTimeInterface $dateRetrait): self
    {
        $this->dateRetrait = $dateRetrait;

        return $this;
    }

    public function getComptes(): ?Compte
    {
        return $this->comptes;
    }

    public function setComptes(?Compte $comptes): self
    {
        $this->comptes = $comptes;

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
}
