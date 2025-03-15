<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cartstate
 *
 * @ORM\Table(name="CartState", uniqueConstraints={@ORM\UniqueConstraint(name="uni_cart_state_name", columns={"name"})})
 * @ORM\Entity
 */
class Cartstate
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="CartState_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=32, nullable=true)
     */
    private $name;

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


}
