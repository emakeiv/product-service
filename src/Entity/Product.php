<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="Product", indexes={@ORM\Index(name="IDX_1CF73D3112469DE2", columns={"category_id"}), @ORM\Index(name="IDX_1CF73D314C7C611F", columns={"discount_id"})})
 * @ORM\Entity
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="Product_id_seq", allocationSize=1, initialValue=1)
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
     * @ORM\Column(name="cost_price", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $costPrice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sell_price", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $sellPrice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sku", type="string", length=16, nullable=true)
     */
    private $sku;

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * @var \Discount
     *
     * @ORM\ManyToOne(targetEntity="Discount")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="discount_id", referencedColumnName="id")
     * })
     */
    private $discount;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Cart", mappedBy="product")
     */
    private $cart = array();

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Order", mappedBy="product")
     */
    private $order = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cart = new \Doctrine\Common\Collections\ArrayCollection();
        $this->order = new \Doctrine\Common\Collections\ArrayCollection();
    }

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

    public function getCostPrice(): ?string
    {
        return $this->costPrice;
    }

    public function setCostPrice(?string $costPrice): static
    {
        $this->costPrice = $costPrice;

        return $this;
    }

    public function getSellPrice(): ?string
    {
        return $this->sellPrice;
    }

    public function setSellPrice(?string $sellPrice): static
    {
        $this->sellPrice = $sellPrice;

        return $this;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(?string $sku): static
    {
        $this->sku = $sku;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getDiscount(): ?Discount
    {
        return $this->discount;
    }

    public function setDiscount(?Discount $discount): static
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * @return Collection<int, Cart>
     */
    public function getCart(): Collection
    {
        return $this->cart;
    }

    public function addCart(Cart $cart): static
    {
        if (!$this->cart->contains($cart)) {
            $this->cart->add($cart);
            $cart->addProduct($this);
        }

        return $this;
    }

    public function removeCart(Cart $cart): static
    {
        if ($this->cart->removeElement($cart)) {
            $cart->removeProduct($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Order>
     */
    public function getOrder(): Collection
    {
        return $this->order;
    }

    public function addOrder(Order $order): static
    {
        if (!$this->order->contains($order)) {
            $this->order->add($order);
            $order->addProduct($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): static
    {
        if ($this->order->removeElement($order)) {
            $order->removeProduct($this);
        }

        return $this;
    }

}
