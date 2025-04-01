<?php

namespace App\Entity;

use App\Repository\DiscountRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiscountRepository::class)]
#[ORM\Table(name: '"Discount"')]
class Discount
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: '"Discount_id_seq"', allocationSize: 1)]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 16, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 64, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?float $percentage = null;

    #[ORM\Column(nullable: true)]
    private ?bool $active = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $created_ts = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $edited_ts = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $deleted_ts = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $active_until_ts = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPercentage(): ?float
    {
        return $this->percentage;
    }

    public function setPercentage(?float $percentage): static
    {
        $this->percentage = $percentage;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): static
    {
        $this->active = $active;

        return $this;
    }

    public function getCreatedTs(): ?\DateTimeInterface
    {
        return $this->created_ts;
    }

    public function setCreatedTs(?\DateTimeInterface $created_ts): static
    {
        $this->created_ts = $created_ts;

        return $this;
    }

    public function getEditedTs(): ?\DateTimeInterface
    {
        return $this->edited_ts;
    }

    public function setEditedTs(?\DateTimeInterface $edited_ts): static
    {
        $this->edited_ts = $edited_ts;

        return $this;
    }

    public function getDeletedTs(): ?\DateTimeInterface
    {
        return $this->deleted_ts;
    }

    public function setDeletedTs(?\DateTimeInterface $deleted_ts): static
    {
        $this->deleted_ts = $deleted_ts;

        return $this;
    }

    public function getActiveUntilTs(): ?\DateTimeInterface
    {
        return $this->active_until_ts;
    }

    public function setActiveUntilTs(?\DateTimeInterface $active_until_ts): static
    {
        $this->active_until_ts = $active_until_ts;

        return $this;
    }
}
