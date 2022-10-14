<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Assert\Email(
        message: 'keine 132 Email'
    )]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(
        min: 5,
        max: 5,
        exactMessage: 'PLZ muss 5 '
    )]
    private ?string $plz = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Feld Ausfüllen')]
    private ?string $ort = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Feld Ausfüllen')]
    private ?string $telefon = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Feld Ausfüllen')]
    private ?string $passwort = null;

    #[ORM\Column]
    private \DateTimeImmutable $createdAt;

    #[ORM\ManyToOne(inversedBy: 'user')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Rights $rights = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }


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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPlz(): ?string
    {
        return $this->plz;
    }

    public function setPlz(string $plz): self
    {
        $this->plz = $plz;

        return $this;
    }

    public function getOrt(): ?string
    {
        return $this->ort;
    }

    public function setOrt(string $ort): self
    {
        $this->ort = $ort;

        return $this;
    }

    public function getTelefon(): ?string
    {
        return $this->telefon;
    }

    public function setTelefon(string $telefon): self
    {
        $this->telefon = $telefon;

        return $this;
    }

    public function getPasswort(): ?string
    {
        return $this->passwort;
    }

    public function setPasswort(string $passwort): self
    {
        $this->passwort = $passwort;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getRights(): ?Rights
    {
        return $this->rights;
    }

    public function setRights(?Rights $rights): self
    {
        $this->rights = $rights;

        return $this;
    }


}
