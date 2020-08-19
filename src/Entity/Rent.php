<?php

namespace App\Entity;

use App\Repository\RentRepository;
use Doctrine\DBAL\Schema\Constraint;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=RentRepository::class)
 * @Vich\Uploadable
 */
class Rent
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
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="integer")
     */
    private $monthPrice;

    /**
     * @ORM\Column(type="integer")
     * 
     */
    private $livingSpace;

    /**
     * @ORM\Column(type="integer")
     */
    private $landSpace;

    /**
     * @ORM\Column(type="integer")
     */
    private $rooms;

    /**
     * @ORM\Column(type="boolean")
     */
    private $meuble;

    /**
     * @ORM\Column(type="boolean")
     */
    private $notMeuble;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dpe;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getMonthPrice(): ?int
    {
        return $this->monthPrice;
    }

    public function setMonthPrice(int $monthPrice): self
    {
        $this->monthPrice = $monthPrice;

        return $this;
    }

    public function getLivingSpace(): ?int
    {
        return $this->livingSpace;
    }

    public function setLivingSpace(int $livingSpace): self
    {
        $this->livingSpace = $livingSpace;

        return $this;
    }

    public function getLandSpace(): ?int
    {
        return $this->landSpace;
    }

    public function setLandSpace(int $landSpace): self
    {
        $this->landSpace = $landSpace;

        return $this;
    }

    public function getRooms(): ?int
    {
        return $this->rooms;
    }

    public function setRooms(int $rooms): self
    {
        $this->rooms = $rooms;

        return $this;
    }

    public function getMeuble(): ?bool
    {
        return $this->meuble;
    }

    public function setMeuble(bool $meuble): self
    {
        $this->meuble = $meuble;

        return $this;
    }

    public function getNotMeuble(): ?bool
    {
        return $this->notMeuble;
    }

    public function setNotMeuble(bool $notMeuble): self
    {
        $this->notMeuble = $notMeuble;

        return $this;
    }

    public function getDpe(): ?string
    {
        return $this->dpe;
    }

    public function setDpe(string $dpe): self
    {
        $this->dpe = $dpe;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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
     * @return Rent
     */
    public function setFilename(?string $filename): Rent
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
     * @return Rent
     */
    public function setImageFile(?File $imageFile): Rent
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
