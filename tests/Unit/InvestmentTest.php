<?php

declare(strict_types=1);

namespace tests\Unit;

use App\Domain\Investment;
use App\Validation\PaymentMethod;
use PHPUnit\Framework\TestCase;

class InvestmentTest extends TestCase
{
    /** @var int */
    const myAmount = 1000;
    /** @var string */
    const myPaymentMethod = PaymentMethod::CASH;

    /** @var Investment */
    private $investment;

    /**
     * @throws \Exception
     */
    public function setUp()
    {
        parent::setUp();

        $this->setInvestment(
            new Investment(
                self::myAmount,
                 new PaymentMethod(self::myPaymentMethod)
            )
        );
    }

    public function test_amount_constructed()
    {
        $this->assertSame($this->getInvestment()->getAmount(), self::myAmount);
    }

    public function test_payment_method_constructed()
    {
        $this->assertSame($this->getInvestment()->getPaymentMethod(), self::myPaymentMethod);
    }

    /**
     * @throws \Exception
     */
    public function test_none_numeric_amount()
    {
        $this->expectExceptionMessage('must be of the type integer, string given,');

        /* @noinspection PhpStrictTypeCheckingInspection */
        new Investment(
            'bob',
            new PaymentMethod(self::myPaymentMethod)
        );
    }

    /**
     * @throws \Exception
     */
    public function test_invalid_payment_method()
    {
        $this->expectExceptionMessage('not a valid payment method');

        /* @noinspection PhpStrictTypeCheckingInspection */
        new Investment(
            self::myAmount,
            new PaymentMethod('bob')
        );
    }

    /**
     * @return Investment
     */
    public function getInvestment(): Investment
    {
        return $this->investment;
    }

    /**
     * @param Investment $investment
     *
     * @return InvestmentTest
     */
    private function setInvestment(Investment $investment): self
    {
        $this->investment = $investment;

        return $this;
    }
}
