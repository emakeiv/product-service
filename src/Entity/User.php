<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '"User"')]
#[UniqueEntity(fields: ['username', 'email'], message: 'This username or email is already in use.')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: '"User_id_seq"', allocationSize: 1)]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $customer_id = null;

    #[ORM\Column(length: 64)]
    #[Assert\NotBlank]
    private ?string $username = null;

    #[ORM\Column(length: 64)]
    #[Assert\NotBlank]
    #[Assert\Email]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(type: 'json')]
    private array $roles = [];

    #[ORM\Column(type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $last_login_ts = null;

    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    private bool $is_verified = false;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $is_active = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $email_validated = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $phone_validated = null;

    // Getters and setters for each property

    /**
     * A visual identifier that represents this user.
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getUsername(): string
    {
        return (string) $this->username;
    }
    /**
     * Returns the roles or permissions granted to the user.
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // Ensure every user has at least ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Returns the hashed password.
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

     /** 
     * Sets email that is associated with user
    */
    public function setEmail(string $email): self
    {
       $this->email = $email;
       return $this;
    }

    public function setUsername(string $username): self
    {
       $this->username = $username;
       return $this;
    }


    /**
     * Returns the salt that was originally used to encode the password.
     */
    public function getSalt(): ?string
    {
        // Not needed when using modern hashing algorithms
        return null;
    }

    /**
     * Removes sensitive data from the user.
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
    }
}
