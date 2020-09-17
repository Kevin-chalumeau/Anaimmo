<?php
namespace App\Model;

use App\Entity\Sale;
use Symfony\Component\Validator\Constraints as Assert;

class ContactBien {
    /**
     * @Assert\Length(
     *      min = 2,
     *      max = 100,
     *      minMessage = "Votre prénom doit avoir plus de deux caractères",
     * )
     * @Assert\Type("string")
     * @Assert\NotBlank(message ="Le champ doit être obligatoirement remplis")
     */
    private $firstname;

    /**
     * @Assert\Length(
     *      min = 2,
     *      max = 100,
     *      minMessage = "Votre nom doit avoir plus de deux caractères",
     * )
     * @Assert\Type("string")
     * @Assert\NotBlank(message ="Le champ doit être obligatoirement rempli")
     */
    private $lastname;

    /**
     * @Assert\Type("string")
     * @Assert\Email(
     *      message = "L'adresse mail n'est une adresse valide")
     * @Assert\NotBlank
     */
    private $email;
    
    /**
     * @Assert\NotBlank
     * @Assert\Type("string")
     * @Assert\Regex(
     *  pattern="/[0-9]{10}/",
     *  message = "Ce champs ne doit contenir que 10 chiffres.")
     */
    private $phone;
    /**
     * @Assert\Length(
     *      min = 1,
     *      max = 100,
     *      minMessage = "Votre sujet doit avoir plus de un caractère",
     * )
     * @Assert\Type("string")
     * @Assert\NotBlank(message = "Le champ doit être obligatoirement rempli")
     */
    private $subject;

    /**
     * @Assert\Length(
     *      min = 1,
     *      max = 1500,
     *      maxMessage = "Le champ ne doit pas dépasser 1500 caractères")
     * @Assert\NotBlank(message = "Le champ doit obligatoirement être rempli")
     */
    private $description;
    
    /**
     * @var Sale
     */
    private $sale;

    /**
     * @return string
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return ContactBien
     */
    public function setFirstname(string $firstname): ContactBien
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
     * @return ContactBien
     */
    public function setLastname(string $lastname): ContactBien
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
     * @return ContactBien
     */
    public function setEmail(string $email): ContactBien
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
     * @return ContactBien
     */
    public function setPhone(string $phone): ContactBien
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     * @return ContactBien
     */
    public function setSubject(string $subject): ContactBien
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return ContactBien
     */
    public function setDescription(string $description): ContactBien
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return Sale
     */
    public function getSale(): ?Sale
    {
        return $this->sale;
    }

    /**
     * @param Sale $sale
     * @return ContactBien
     */
    public function setSale(?Sale $sale): ContactBien
    {
        $this->sale = $sale;
        return $this;
    }
}
