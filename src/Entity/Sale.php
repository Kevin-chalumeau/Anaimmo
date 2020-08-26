<?php

namespace App\Entity;

use App\Repository\SaleRepository;
use DateTime;
use Doctrine\DBAL\Schema\Constraint;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Cocur\Slugify\Slugify;
use PhpParser\Node\Expr\Cast\String_;

/**
 * @ORM\Entity(repositoryClass=SaleRepository::class)
 * @Vich\Uploadable
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
     * @var string|null
     * @ORM\Column(type="string", length=255)
     */
    private $filename;

    /**
     * @var File|null
     * @Vich\UploadableField(mapping="rent_image", fileNameProperty="filename")
     */
    private $imageFile;

    /**
     * @ORM\Column(type="integer")
     */
    private $mandatNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $annonceTitle;

    /**
     * @ORM\Column(type="integer")
     */
    private $priceFAI;

    /**
     * @ORM\Column(type="integer")
     */
    private $netSellerPrice;

    /**
     * @ORM\Column(type="float")
     */
    private $pourcentage;

    /**
     * @ORM\Column(type="integer")
     */
    private $honorary;

    /**
     * @ORM\Column(type="integer")
     */
    private $livingArea;

    /**
     * @ORM\Column(type="integer")
     */
    private $landArea;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptif;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    public function __construct()
    {
        $this->updated_at = new DateTime();
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

    public function getSlug(): string
    {
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

    /**
     * @return null|string
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }

    /**
     * @param null|string $filename
     * @return Sale
     */
    public function setFilename(?string $filename): Sale
    {
        $this->filename = $filename;
        return $this;
    }

    /**
     * @return null|File
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @param null|File $imageFile
     * @return Sale
     */
    public function setImageFile(?File $imageFile): Sale
    {
        $this->imageFile = $imageFile;

        if ($this->imageFile instanceof UploadedFile) {
            $this->updated_at = new \DateTime('now');
        }
        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
