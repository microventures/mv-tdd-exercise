<?php

declare(strict_types=1);

namespace App\Validation;

/**
 * Class EmailAddress.
 */
class EmailAddress
{
    /**
     * @var string
     */
    private $emailAddress;

    /**
     * EmailAddress constructor.
     *
     * @param string $emailAddress
     * @throws \Exception
     */
    public function __construct(string $emailAddress)
    {
        if ( ! preg_match('/^.+\@\S+\.\S+$/', $emailAddress)) {
            throw new \Exception('invalid email address found.');
        }

        $this->setEmailAddress($emailAddress);
    }

    /**
     * @return string
     */
    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }

    /**
     * @param string $emailAddress
     *
     * @return EmailAddress
     */
    private function setEmailAddress(string $emailAddress): self
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }
}
