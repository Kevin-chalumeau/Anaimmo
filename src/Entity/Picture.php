<?php

namespace App\Entity;

use App\Entity\Sale;
use App\Repository\PictureRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=PictureRepository::class)
 * @Vich\Uploadable()
 */
class Picture
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $filename;

    /**
     * @var File|null
     * @Vich\UploadableField(mapping="sale_image", fileNameProperty="filename")
     */
    private $imageFile;

    /**
     *  /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sale", inversedBy="pictures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sale;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(?string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    public function getSale(): ?Sale
    {
        return $this->sale;
    }

    public function setSale(?Sale $sale): self
    {
        $this->sale = $sale;

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
     * @return self
     */
    public function setImageFile(?File $imageFile): self
    {
        $this->imageFile = $imageFile;
        return $this;
    }
}

