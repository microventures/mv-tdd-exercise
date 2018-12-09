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
    /**
     * @var array<Investment>
     */
    private $investments = [];

    /**
     * Offering constructor.
     *
     * @param string $name
     * @param int    $maxInvestmentsAllowed
     *
     * @throws \Exception
     */
    public function __construct(string $name, int $maxInvestmentsAllowed)
    {
        $this->setName($name);
        $this->setMaxInvestmentsAllowed($maxInvestmentsAllowed);
    }

    /**
     * @param Investment $investment
     *
     * @throws \Exception
     */
    public function addInvestment(Investment $investment)
    {
        $count = empty($this->investments[0]) ? 0 : \count($this->investments);

        if (($count + 1) > $this->maxInvestmentsAllowed) {
            throw new \Exception('maximum number of investment reached.');
        }

        $this->investments[] = $investment;
    }

    /**
     * @return array
     */
    public function getInvestments(): array
    {
        return $this->investments;
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
     *
     * @throws \Exception
     */
    private function setMaxInvestmentsAllowed(int $maxInvestmentsAllowed): self
    {
        $this->maxInvestmentsAllowed = $maxInvestmentsAllowed;

        return $this;
    }
}
