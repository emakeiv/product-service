<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Shoppingsession
 *
 * @ORM\Table(name="ShoppingSession", indexes={@ORM\Index(name="IDX_E5B02FC79395C3F3", columns={"customer_id"})})
 * @ORM\Entity
 */
class Shoppingsession
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ShoppingSession_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="session_start", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $sessionStart = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="session_end", type="datetime", nullable=true)
     */
    private $sessionEnd;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cart_id", type="integer", nullable=true)
     */
    private $cartId;

    /**
     * @var \Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     * })
     */
    private $customer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSessionStart(): ?\DateTimeInterface
    {
        return $this->sessionStart;
    }

    public function setSessionStart(?\DateTimeInterface $sessionStart): static
    {
        $this->sessionStart = $sessionStart;

        return $this;
    }

    public function getSessionEnd(): ?\DateTimeInterface
    {
        return $this->sessionEnd;
    }

    public function setSessionEnd(?\DateTimeInterface $sessionEnd): static
    {
        $this->sessionEnd = $sessionEnd;

        return $this;
    }

    public function getCartId(): ?int
    {
        return $this->cartId;
    }

    public function setCartId(?int $cartId): static
    {
        $this->cartId = $cartId;

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


}
