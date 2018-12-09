<?php

declare(strict_types=1);

namespace App\Domain;

/**
 * Class Offering.
 */
class Offering
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $maxInvestmentsAllowed;

    public function __construct(string $name, int $maxInvestmentsAllowed)
    {
        $this->setName($name);
        $this->setMaxInvestmentsAllowed($maxInvestmentsAllowed);
    }

    public function addInvestment()
    {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Offering
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxInvestmentsAllowed(): int
    {
        return $this->maxInvestmentsAllowed;
    }

    /**
     * @param int $maxInvestmentsAllowed
     *
     * @return Offering
     */
    public function setMaxInvestmentsAllowed(int $maxInvestmentsAllowed): self
    {
        $this->maxInvestmentsAllowed = $maxInvestmentsAllowed;

        return $this;
    }
}
