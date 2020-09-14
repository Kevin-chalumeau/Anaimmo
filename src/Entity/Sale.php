<?php

namespace App\Entity;

use App\Repository\SaleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Schema\Constraint;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=SaleRepository::class)
 * @UniqueEntity("annonceTitle")
 */
class Sale
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    private $mandatNumber;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Notblank
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Notblank
     */
    private $annonceTitle;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Notblank
     */
    private $priceFAI;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Notblank
     */
    private $netSellerPrice;

    /**
     * @ORM\Column(type="float")
     * @Assert\Notblank
     */
    private $pourcentage;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Notblank
     */
    private $honorary;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Notblank
     *  @Assert\Range(min=10, max=600)
     */
    private $livingArea;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Notblank
     */
    private $landArea;

    /**
     * @ORM\Column(type="text")
     * @Assert\Notblank
     */
    private $descriptif;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Notblank
     */
    private $city;

    /**
     * @ORM\ManyToMany(targetEntity=Option::class, inversedBy="sales")
     */
    private $options;


    public function __construct()
    {
        $this->options = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMandatNumber(): ?int
    {
        return $this->mandatNumber;
    }

    public function setMandatNumber(int $mandatNumber): self
    {
        $this->mandatNumber = $mandatNumber;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getAnnonceTitle(): ?string
    {
        return $this->annonceTitle;
    }

    public function setAnnonceTitle(string $annonceTitle): self
    {
        $this->annonceTitle = $annonceTitle;

        return $this;
    }

    public function getSlug(): string {
        return (new Slugify())->slugify($this->annonceTitle);
    }

    public function getPriceFAI(): ?int
    {
        return $this->priceFAI;
    }

    public function setPriceFAI(int $priceFAI): self
    {
        $this->priceFAI = $priceFAI;

        return $this;
    }

    public function getNetSellerPrice(): ?int
    {
        return $this->netSellerPrice;
    }

    public function setNetSellerPrice(int $netSellerPrice): self
    {
        $this->netSellerPrice = $netSellerPrice;

        return $this;
    }

    public function getPourcentage(): ?float
    {
        return $this->pourcentage;
    }

    public function setPourcentage(float $pourcentage): self
    {
        $this->pourcentage = $pourcentage;

        return $this;
    }

    public function getHonorary(): ?int
    {
        return $this->honorary;
    }

    public function setHonorary(int $honorary): self
    {
        $this->honorary = $honorary;

        return $this;
    }

    public function getLivingArea(): ?int
    {
        return $this->livingArea;
    }

    public function setLivingArea(int $livingArea): self
    {
        $this->livingArea = $livingArea;

        return $this;
    }

    public function getLandArea(): ?int
    {
        return $this->landArea;
    }

    public function setLandArea(int $landArea): self
    {
        $this->landArea = $landArea;

        return $this;
    }

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(string $descriptif): self
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return Collection|Option[]
     */
    public function getOptions(): Collection
    {
        return $this->options;
    }

    public function addOption(Option $option): self
    {
        if (!$this->options->contains($option)) {
            $this->options[] = $option;
            $option->addSale($this);
        }

        return $this;
    }

    public function removeOption(Option $option): self
    {
        if ($this->options->contains($option)) {
            $this->options->removeElement($option);
            $option->removeSale($this);
        }

        return $this;
    }

}
