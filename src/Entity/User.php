<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="User", uniqueConstraints={@ORM\UniqueConstraint(name="unique_uname_and_email", columns={"username", "email_address"})}, indexes={@ORM\Index(name="IDX_2DA179779395C3F3", columns={"customer_id"})})
 * @ORM\Entity
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="User_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=64, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="email_address", type="string", length=64, nullable=false)
     */
    private $emailAddress;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password_hash", type="string", length=64, nullable=true)
     */
    private $passwordHash;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="last_login_ts", type="datetime", nullable=true)
     */
    private $lastLoginTs;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=true)
     */
    private $isActive;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="email_validated", type="boolean", nullable=true)
     */
    private $emailValidated;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="phone_validated", type="boolean", nullable=true)
     */
    private $phoneValidated;

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

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

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

    public function getPasswordHash(): ?string
    {
        return $this->passwordHash;
    }

    public function setPasswordHash(?string $passwordHash): static
    {
        $this->passwordHash = $passwordHash;

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

    public function getLastLoginTs(): ?\DateTimeInterface
    {
        return $this->lastLoginTs;
    }

    public function setLastLoginTs(?\DateTimeInterface $lastLoginTs): static
    {
        $this->lastLoginTs = $lastLoginTs;

        return $this;
    }

    public function isIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(?bool $isActive): static
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function isEmailValidated(): ?bool
    {
        return $this->emailValidated;
    }

    public function setEmailValidated(?bool $emailValidated): static
    {
        $this->emailValidated = $emailValidated;

        return $this;
    }

    public function isPhoneValidated(): ?bool
    {
        return $this->phoneValidated;
    }

    public function setPhoneValidated(?bool $phoneValidated): static
    {
        $this->phoneValidated = $phoneValidated;

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
