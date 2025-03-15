<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Barcode
 *
 * @ORM\Table(name="Barcode", indexes={@ORM\Index(name="IDX_58133BFA4584665A", columns={"product_id"})})
 * @ORM\Entity
 */
class Barcode
{
    /**
     * @var string
     *
     * @ORM\Column(name="barcode", type="string", length=13, nullable=false, options={"fixed"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="Barcode_barcode_seq", allocationSize=1, initialValue=1)
     */
    private $barcode;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     * })
     */
    private $product;

    public function getBarcode(): ?string
    {
        return $this->barcode;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): static
    {
        $this->product = $product;

        return $this;
    }


}
