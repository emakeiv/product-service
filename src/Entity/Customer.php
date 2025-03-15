<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table(name="Customer", uniqueConstraints={@ORM\UniqueConstraint(name="unique_customer_email", columns={"email_address"})})
 * @ORM\Entity
 */
class Customer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="Customer_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=32, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=32, nullable=false)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_no", type="string", length=16, nullable=false)
     */
    private $phoneNo;

    /**
     * @var string
     *
     * @ORM\Column(name="email_address", type="string", length=64, nullable=false)
     */
    private $emailAddress;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="edited_at", type="datetime", nullable=true)
     */
    private $editedAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="guest_expiry", type="datetime", nullable=true)
     */
    private $guestExpiry;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="is_registered", type="boolean", nullable=true)
     */
    private $isRegistered;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPhoneNo(): ?string
    {
        return $this->phoneNo;
    }

    public function setPhoneNo(string $phoneNo): static
    {
        $this->phoneNo = $phoneNo;

        return $this;
    }

    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    public function setEmailAddress(string $emailAddress): static
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getEditedAt(): ?\DateTimeInterface
    {
        return $this->editedAt;
    }

    public function setEditedAt(?\DateTimeInterface $editedAt): static
    {
        $this->editedAt = $editedAt;

        return $this;
    }

    public function getGuestExpiry(): ?\DateTimeInterface
    {
        return $this->guestExpiry;
    }

    public function setGuestExpiry(?\DateTimeInterface $guestExpiry): static
    {
        $this->guestExpiry = $guestExpiry;

        return $this;
    }

    public function isIsRegistered(): ?bool
    {
        return $this->isRegistered;
    }

    public function setIsRegistered(?bool $isRegistered): static
    {
        $this->isRegistered = $isRegistered;

        return $this;
    }


}
