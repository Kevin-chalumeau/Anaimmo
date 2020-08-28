<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraint as Assert;

class Contact {

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $firstname;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $lastname;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Regex(
     *  pattern="[0-9]{10}/")
     */
    private $phone;

    /**
     * @var string
     * @Assert\NotBlank()
     * Assert\Email()
     */
    private $email;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(min=10)
     */
    private $message;
       
    /**
     *@var Sale
     */
    private $sale;
    

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return Contact
     */
    public function setFirstname(string $firstname): Contact
    {
        $this->firstname = $firstname;
        return $this;
    }

     /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return Contact
     */
    public function setLastname(string $lastname): Contact
    {
        $this->lastname = $lastname;
        return $this;
    }

     /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Contact
     */
    public function setPhone(string $phone): Contact
    {
        $this->phone = $phone;
        return $this;
    }

     /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Contact
     */
    public function setEmail(string $email): Contact
    {
        $this->lemail = $email;
        return $this;
    }

     /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return Contact
     */
    public function setMessage(string $message): Contact
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return Sale
     */
    public function getSale(): Sale
    {
        return $this->sale;
    }

    /**
     * @param Sale $sale
     * @return Contact
     */
    public function setSale(Sale $sale): Contact
    {
        $this->sale = $sale;
        return $this;
    }
}