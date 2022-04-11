<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\GladiatorRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=GladiatorRepository::class)
 * @ApiResource()
 */
class Gladiator
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("gladiator_read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("gladiator_read")
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     * @Groups("gladiator_read")
     */
    private $rarity;

    /**
     * @ORM\Column(type="integer")
     * @Groups("gladiator_read")
     */
    private $str;

    /**
     * @ORM\Column(type="integer")
     * @Groups("gladiator_read")
     */
    private $con;

    /**
     * @ORM\Column(type="integer")
     * @Groups("gladiator_read")
     */
    private $inteligence;

    /**
     * @ORM\Column(type="integer")
     * @Groups("gladiator_read")
     */
    private $dex;

    /**
     * @ORM\Column(type="integer")
     * @Groups("gladiator_read")
     */
    private $cha;

    /**
     * @ORM\Column(type="integer")
     * @Groups("gladiator_read")
     */
    private $health;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="gladiators")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getRarity(): ?int
    {
        return $this->rarity;
    }

    public function setRarity(int $rarity): self
    {
        $this->rarity = $rarity;

        return $this;
    }

    public function getStr(): ?int
    {
        return $this->str;
    }

    public function setStr(int $str): self
    {
        $this->str = $str;

        return $this;
    }

    public function getCon(): ?int
    {
        return $this->con;
    }

    public function setCon(int $con): self
    {
        $this->con = $con;

        return $this;
    }

    public function getInteligence(): ?int
    {
        return $this->inteligence;
    }

    public function setInteligence(int $inteligence): self
    {
        $this->inteligence = $inteligence;

        return $this;
    }

    public function getDex(): ?int
    {
        return $this->dex;
    }

    public function setDex(int $dex): self
    {
        $this->dex = $dex;

        return $this;
    }

    public function getCha(): ?int
    {
        return $this->cha;
    }

    public function setCha(int $cha): self
    {
        $this->cha = $cha;

        return $this;
    }

    public function getHealth(): ?int
    {
        return $this->health;
    }

    public function setHealth(int $health): self
    {
        $this->health = $health;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }
}
