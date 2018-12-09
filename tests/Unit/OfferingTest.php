<?php

declare(strict_types=1);

namespace tests\Unit;

use App\Domain\Investment;
use App\Domain\Offering;
use App\Validation\PaymentMethod;
use PHPUnit\Framework\TestCase;

class OfferingTest extends TestCase
{
    /** @var string */
    const OFFER_NAME = 'Offer 1';
    /** @var int */
    const MAX_INVESTMENT_FOR_OFFERING = 1;

    /** @var Offering */
    private $offering;

    /**
     * @throws \Exception
     */
    public function setUp()
    {
        parent::setUp();

        $this->setOffering(
            new Offering(
                self::OFFER_NAME,
                self::MAX_INVESTMENT_FOR_OFFERING
            )
        );
    }

    public function test_offer_name_constructed()
    {
        $this->assertSame($this->getOffering()->getName(), self::OFFER_NAME);
    }

    public function test_max_investments_allowed_constructed()
    {
        $this->assertSame($this->getOffering()->getMaxInvestmentsAllowed(), self::MAX_INVESTMENT_FOR_OFFERING);
    }

    /**
     * @throws \Exception
     */
    public function test_invalid_offer_name()
    {
        $this->expectExceptionMessage('must be of the type string, integer given,');

        /* @noinspection PhpStrictTypeCheckingInspection */
        new Offering(
            100,
            self::MAX_INVESTMENT_FOR_OFFERING
        );
    }

    /**
     * @throws \Exception
     */
    public function test_valid_max_investment_count_check()
    {
        $this->getOffering()->addInvestment(
            new Investment(100,
                           new PaymentMethod('cash')
            )
        );

        $this->assertCount(1, $this->getOffering()->getInvestments());
    }

    /**
     * @throws \Exception
     */
    public function test_invalid_max_investment_count_check()
    {
        $this->expectExceptionMessage('maximum number of investment reached.');

        $this->getOffering()->addInvestment(
            new Investment(100, new PaymentMethod('cash'))
        );

        $this->getOffering()->addInvestment(
            new Investment(200, new PaymentMethod('cash'))
        );
    }

    /**
     * @throws \Exception
     */
    public function test_invalid_type_for_max_investments_allowed()
    {
        $this->expectExceptionMessage('must be of the type integer, string given,');

        /* @noinspection PhpStrictTypeCheckingInspection */
        new Offering(
            self::OFFER_NAME,
            'bob'
        );
    }

    /**
     * @return Offering
     */
    public function getOffering(): Offering
    {
        return $this->offering;
    }

    /**
     * @param Offering $offering
     *
     * @return OfferingTest
     */
    public function setOffering(Offering $offering): self
    {
        $this->offering = $offering;

        return $this;
    }
}
