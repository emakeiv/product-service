<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Discount
 *
 * @ORM\Table(name="Discount")
 * @ORM\Entity
 */
class Discount
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="Discount_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=16, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=64, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="percentage", type="decimal", precision=4, scale=2, nullable=true)
     */
    private $percentage;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_ts", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdTs = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="edited_ts", type="datetime", nullable=true)
     */
    private $editedTs;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="deleted_ts", type="datetime", nullable=true)
     */
    private $deletedTs;

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

    public function getPercentage(): ?string
    {
        return $this->percentage;
    }

    public function setPercentage(?string $percentage): static
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
        return $this->createdTs;
    }

    public function setCreatedTs(?\DateTimeInterface $createdTs): static
    {
        $this->createdTs = $createdTs;

        return $this;
    }

    public function getEditedTs(): ?\DateTimeInterface
    {
        return $this->editedTs;
    }

    public function setEditedTs(?\DateTimeInterface $editedTs): static
    {
        $this->editedTs = $editedTs;

        return $this;
    }

    public function getDeletedTs(): ?\DateTimeInterface
    {
        return $this->deletedTs;
    }

    public function setDeletedTs(?\DateTimeInterface $deletedTs): static
    {
        $this->deletedTs = $deletedTs;

        return $this;
    }


}
