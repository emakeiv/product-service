<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Paymenttype
 *
 * @ORM\Table(name="PaymentType", indexes={@ORM\Index(name="IDX_D078AF0E9395C3F3", columns={"customer_id"}), @ORM\Index(name="IDX_D078AF0EA53A8AA", columns={"provider_id"})})
 * @ORM\Entity
 */
class Paymenttype
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="PaymentType_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=32, nullable=true)
     */
    private $name;

    /**
     * @var int|null
     *
     * @ORM\Column(name="vendor_id", type="integer", nullable=true)
     */
    private $vendorId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="expiry", type="datetime", nullable=true)
     */
    private $expiry;

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
     * @var \Paymentprovider
     *
     * @ORM\ManyToOne(targetEntity="Paymentprovider")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provider_id", referencedColumnName="id")
     * })
     */
    private $provider;

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

    public function getVendorId(): ?int
    {
        return $this->vendorId;
    }

    public function setVendorId(?int $vendorId): static
    {
        $this->vendorId = $vendorId;

        return $this;
    }

    public function getExpiry(): ?\DateTimeInterface
    {
        return $this->expiry;
    }

    public function setExpiry(?\DateTimeInterface $expiry): static
    {
        $this->expiry = $expiry;

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

    public function getProvider(): ?Paymentprovider
    {
        return $this->provider;
    }

    public function setProvider(?Paymentprovider $provider): static
    {
        $this->provider = $provider;

        return $this;
    }


}
