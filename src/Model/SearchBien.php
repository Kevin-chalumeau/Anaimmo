<?php
namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class SearchBien
{   
    /**
     * @Assert\Length(
     *      min = 2,
     *      max = 100,
     *      minMessage = "Votre nom doit avoir plus de deux caractères",
     * )
     * @Assert\Type("string")
     * @Assert\NotBlank(message ="Le champ doit être obligatoirement rempli")
     */
    private $firstname;

    /**
     * @Assert\Length(
     *      min = 2,
     *      max = 100,
     *      minMessage = "Votre prénom doit avoir plus de deux caractères",
     * )
     * @Assert\Type("string")
     * @Assert\NotBlank(message ="Le champ doit être obligatoirement remplis")
     */
    private $lastname;

    /**
     * @Assert\NotBlank
     * @Assert\Type("string")
     * @Assert\Regex(
     *  pattern="/[0-9]{10}/")
     */
    private $phone;

    /**
     * @Assert\Type("string")
     * @Assert\Email(
     *      message = "L'adresse mail n'est une adresse valide")
     * @Assert\NotBlank
     */
    private $email;

    /**
    * @Assert\Type("string")
    * @Assert\NotBlank
    */
    private $type;

    /**
    * @Assert\Type("string")
    * @Assert\NotBlank
    */
    private $budget;

    /**
    * @Assert\Type("string")
    * @Assert\NotBlank
    */
    private $localisation;

    /**
    * @Assert\Type("string")
    * @Assert\NotBlank
    */
    private $rooms;

    /**
    * @Assert\Type("string")
    * @Assert\NotBlank
    */
    private $livingSpace;

    /**
    * @Assert\Type("string")
    * @Assert\NotBlank
    */
    private $landSpace;

    /**
     * @Assert\Length(
     *      min = 1,
     *      max = 1500,
     *      maxMessage = "Le champ ne doit pas dépasser 1500 caractères")
     * @Assert\NotBlank(message = "Le champ doit obligatoirement être rempli")
     */
    private $message;

    /**
     * @return string
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return SearchBien
     */
    public function setFirstname(string $firstname): Searchbien
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return SearchBien
     */
    public function setLastname(string $lastname): SearchBien
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return SearchBien
     */
    public function setEmail(string $email): SearchBien
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return SearchBien
     */
    public function setPhone(string $phone): SearchBien
    {
        $this->phone = $phone;
        return $this;
    }


    /**
     * @return string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string
     * @return SearchBien
     */
    public function setType(string $type): SearchBien
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getBudget(): ?string
    {
        return $this->budget;
    }

    /**
     * @param string
     * @return SearchBien
     */
    public function setBudget(string $budget): SearchBien
    {
        $this->budget = $budget;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    /**
     * @param string
     * @return SearchBien
     */
    public function setLocalisation(string $localisation): SearchBien
    {
        $this->localisation = $localisation;
        return $this;
    }

    /**
     * @return string
     */
    public function getRooms(): ?string
    {
        return $this->rooms;
    }

    /**
     * @param string
     * @return SearchBien
     */
    public function setRooms(string $rooms): SearchBien
    {
        $this->rooms = $rooms;
        return $this;
    }

    /**
     * @return string
     */
    public function getLivingSpace(): ?string
    {
        return $this->livingSpace;
    }

    /**
     * @param string
     * @return SearchBien
     */
    public function setLivingSpace(string $livingSpace): SearchBien
    {
        $this->livingSpace = $livingSpace;
        return $this;
    }

    /**
     * @return string
     */
    public function getLandSpace(): ?string
    {
        return $this->landSpace;
    }

    /**
     * @param string
     * @return SearchBien
     */
    public function setLandSpace(string $landSpace): SearchBien
    {
        $this->landSpace = $landSpace;
        return $this;
    }

     /**
     * @return string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return SearchBien
     */
    public function setMessage(string $message): SearchBien
    {
        $this->message = $message;
        return $this;
    }
}