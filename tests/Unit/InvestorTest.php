<?php

declare(strict_types=1);

namespace tests\Uint;

use App\Domain\Investors;
use PHPUnit\Framework\TestCase;

class InvestorTest extends TestCase
{
    const firstName = 'Rich';
    const lastName = 'Jones';
    const email = 'jones_rich@yahoo.com';

    private $investor = null;

    public function setUp()
    {
        parent::setUp();

        $this->investor = new Investors(
            self::firstName,
            self::lastName,
            self::email
        );
    }

    public function test_first_name_constructed()
    {
        $this->assertSame($this->getInvestor()->getFirstName(), self::firstName);
    }

    public function test_last_name_constructed()
    {
        $this->assertSame($this->getInvestor()->getLastName(), self::lastName);
    }

    public function test_email_constructed()
    {
        $this->assertSame($this->getInvestor()->getEmail(), self::email);
    }

    public function test_approved_constructed()
    {
        $this->assertNotTrue($this->getInvestor()->isApproved());
    }

    /**
     * @return Investors
     */
    protected function getInvestor(): Investors
    {
        return $this->investor;
    }
}
