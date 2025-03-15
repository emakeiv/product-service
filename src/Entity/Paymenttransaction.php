<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Paymenttransaction
 *
 * @ORM\Table(name="PaymentTransaction", indexes={@ORM\Index(name="IDX_FF50439B8D9F6D38", columns={"order_id"}), @ORM\Index(name="IDX_FF50439BC54C8C93", columns={"type_id"}), @ORM\Index(name="IDX_FF50439B5D83CC1", columns={"state_id"})})
 * @ORM\Entity
 */
class Paymenttransaction
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="PaymentTransaction_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="payment_date", type="datetime", nullable=true)
     */
    private $paymentDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="amount", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $amount;

    /**
     * @var \Order
     *
     * @ORM\ManyToOne(targetEntity="Order")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     * })
     */
    private $order;

    /**
     * @var \Paymenttype
     *
     * @ORM\ManyToOne(targetEntity="Paymenttype")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     * })
     */
    private $type;

    /**
     * @var \Paymenttransactionstate
     *
     * @ORM\ManyToOne(targetEntity="Paymenttransactionstate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="state_id", referencedColumnName="id")
     * })
     */
    private $state;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaymentDate(): ?\DateTimeInterface
    {
        return $this->paymentDate;
    }

    public function setPaymentDate(?\DateTimeInterface $paymentDate): static
    {
        $this->paymentDate = $paymentDate;

        return $this;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(?string $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    public function getOrder(): ?Order
    {
        return $this->order;
    }

    public function setOrder(?Order $order): static
    {
        $this->order = $order;

        return $this;
    }

    public function getType(): ?Paymenttype
    {
        return $this->type;
    }

    public function setType(?Paymenttype $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getState(): ?Paymenttransactionstate
    {
        return $this->state;
    }

    public function setState(?Paymenttransactionstate $state): static
    {
        $this->state = $state;

        return $this;
    }


}
