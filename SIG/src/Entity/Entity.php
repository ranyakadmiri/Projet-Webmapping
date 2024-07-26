<?php

namespace App\Entity;

use App\Repository\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntityRepository::class)]
class Entity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $reference = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type = null;

    #[ORM\Column(type: 'geometry', nullable: true)]
    private $geometry = null;

    #[ORM\Column(nullable: true)]
    private ?array $infos = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getGeometry()
    {
        return $this->geometry;
    }

    public function setGeometry($geometry): static
    {
        $this->geometry = $geometry;

        return $this;
    }

    public function getInfos(): ?array
    {
        return $this->infos;
    }

    public function setInfos(?array $infos): static
    {
        $this->infos = $infos;

        return $this;
    }
}
