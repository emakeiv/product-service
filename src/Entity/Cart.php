<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Cart
 *
 * @ORM\Table(name="Cart", indexes={@ORM\Index(name="IDX_AB9127899395C3F3", columns={"customer_id"}), @ORM\Index(name="IDX_AB912789FC79BFF3", columns={"cart_state"})})
 * @ORM\Entity
 */
class Cart
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="Cart_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_ts", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdTs = 'CURRENT_TIMESTAMP';

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
     * @var \Cartstate
     *
     * @ORM\ManyToOne(targetEntity="Cartstate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cart_state", referencedColumnName="id")
     * })
     */
    private $cartState;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Product", inversedBy="cart")
     * @ORM\JoinTable(name="cartitem",
     *   joinColumns={
     *     @ORM\JoinColumn(name="cart_id", referencedColumnName="id")
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

    public function getCreatedTs(): ?\DateTimeInterface
    {
        return $this->createdTs;
    }

    public function setCreatedTs(?\DateTimeInterface $createdTs): static
    {
        $this->createdTs = $createdTs;

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

    public function getCartState(): ?Cartstate
    {
        return $this->cartState;
    }

    public function setCartState(?Cartstate $cartState): static
    {
        $this->cartState = $cartState;

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
