<?php

namespace App\Entity;

use App\Repository\RentRepository;
use Doctrine\DBAL\Schema\Constraint;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=RentRepository::class)
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
     * @Assert\NotBlank
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
     * @Assertt\Range(min="5", max="1500")
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
}
