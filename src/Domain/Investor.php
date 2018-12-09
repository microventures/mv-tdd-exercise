<?php

declare(strict_types=1);

namespace App\Domain;

use App\Validation\EmailAddress;

/**
 * Class Investor.
 */
class Investor
{
    /**
     * @var string
     */
    private $firstName;
    /**
     * @var string
     */
    private $lastName;
    /**
     * @var string
     */
    private $email;
    /**
     * @var bool
     */
    private $approved;

    /**
     * Investor constructor.
     *
     * @param string       $firstName
     * @param string       $lastName
     * @param EmailAddress $email
     * @param bool         $approved
     */
    public function __construct(string $firstName, string $lastName, EmailAddress $email, bool $approved = false)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setEmail($email->getEmailAddress());
        $this->setApproved($approved);
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return bool
     */
    public function isApproved(): bool
    {
        return $this->approved;
    }

    /**
     * @param string $firstName
     *
     * @return Investor
     */
    private function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @param string $lastName
     *
     * @return Investor
     */
    private function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @param string $email
     *
     * @return Investor
     */
    private function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @param bool $approved
     *
     * @return Investor
     */
    private function setApproved(bool $approved): self
    {
        $this->approved = $approved;

        return $this;
    }
}
