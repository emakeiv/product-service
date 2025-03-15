<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Order
 *
 * @ORM\Table(name="Order", indexes={@ORM\Index(name="IDX_34E8BC9C9395C3F3", columns={"customer_id"})})
 * @ORM\Entity
 */
class Order
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="Order_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_placed", type="datetime", nullable=true)
     */
    private $datePlaced;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_shipped", type="datetime", nullable=true)
     */
    private $dateShipped;

    /**
     * @var string|null
     *
     * @ORM\Column(name="shipping_price", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $shippingPrice;

    /**
     * @var \Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     * })
     */
    private $customer;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Product", inversedBy="order")
     * @ORM\JoinTable(name="orderline",
     *   joinColumns={
     *     @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     *   }
     * )
     */
    private $product = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->product = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatePlaced(): ?\DateTimeInterface
    {
        return $this->datePlaced;
    }

    public function setDatePlaced(?\DateTimeInterface $datePlaced): static
    {
        $this->datePlaced = $datePlaced;

        return $this;
    }

    public function getDateShipped(): ?\DateTimeInterface
    {
        return $this->dateShipped;
    }

    public function setDateShipped(?\DateTimeInterface $dateShipped): static
    {
        $this->dateShipped = $dateShipped;

        return $this;
    }

    public function getShippingPrice(): ?string
    {
        return $this->shippingPrice;
    }

    public function setShippingPrice(?string $shippingPrice): static
    {
        $this->shippingPrice = $shippingPrice;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): static
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(Product $product): static
    {
        if (!$this->product->contains($product)) {
            $this->product->add($product);
        }

        return $this;
    }

    public function removeProduct(Product $product): static
    {
        $this->product->removeElement($product);

        return $this;
    }

}
