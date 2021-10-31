<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{

    /**
     * @var string | null
     * @Assert\Length(min=2, max=100)
     * @Assert\NotBlank()
     */
    private $firstName;

    /**
     * @var string | null
     * @Assert\Length(min=2, max=100)
     * @Assert\NotBlank()
     */
    private $lastName;

    /**
     * @var string | null
     * @Assert\Email()
     * @Assert\NotBlank()
     */
    private $email;

    /**
     * @var string | null
     * @Assert\NotBlank()
     */
    private $phone;

    /**
     * @var string | null
     * @Assert\NotBlank()
     * @Assert\NotBlank
     */
    private $message;

    /**
     * @var Property | null
     */
    private $property;

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     */
    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     */
    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return Property|null
     */
    public function getProperty(): ?Property
    {
        return $this->property;
    }

    /**
     * @param Property|null $property
     */
    public function setProperty(?Property $property): void
    {
        $this->property = $property;
    }

}