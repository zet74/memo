<?php

namespace App\Entity;

use App\Repository\BenevoleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BenevoleRepository::class)
 */
class Benevole
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="benevole", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $userid;

    /**
     * @ORM\Column(type="date")
     */
    private $dateOfEntry;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserid(): ?User
    {
        return $this->userid;
    }

    public function setUserid(User $userid): self
    {
        $this->userid = $userid;

        return $this;
    }

    public function getDateOfEntry(): ?\DateTimeInterface
    {
        return $this->dateOfEntry;
    }

    public function setDateOfEntry(\DateTimeInterface $dateOfEntry): self
    {
        $this->dateOfEntry = $dateOfEntry;

        return $this;
    }
}
