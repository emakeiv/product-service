<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="Category", indexes={@ORM\Index(name="IDX_FF3A7B97B6CFDCA8", columns={"category_name_id"})})
 * @ORM\Entity
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="Category_id_seq", allocationSize=1, initialValue=1)
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
     * @ORM\Column(name="tag", type="string", length=16, nullable=true)
     */
    private $tag;

    /**
     * @var \Categoryname
     *
     * @ORM\ManyToOne(targetEntity="Categoryname")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_name_id", referencedColumnName="id")
     * })
     */
    private $categoryName;

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

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function setTag(?string $tag): static
    {
        $this->tag = $tag;

        return $this;
    }

    public function getCategoryName(): ?Categoryname
    {
        return $this->categoryName;
    }

    public function setCategoryName(?Categoryname $categoryName): static
    {
        $this->categoryName = $categoryName;

        return $this;
    }


}
