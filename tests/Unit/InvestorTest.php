<?php

declare(strict_types=1);

namespace tests\Uint;

use App\Domain\Investor;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

/**
 * Class InvestorTest.
 */
class InvestorTest extends TestCase
{
    /** @var string */
    const firstName = 'Rich';
    /** @var string */
    const lastName = 'Jones';
    /** @var string */
    const email = 'jones_rich@yahoo.com';

    /** @var null */
    private $investor = null;

    public function setUp()
    {
        parent::setUp();

        $this->setInvestor(
            new Investor(
                self::firstName,
                self::lastName,
                self::email
            )
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
     * tests if a null is passed to string param(s) on Investor class
     * construction.
     *
     * @throws \Throwable
     */
    public function test_fails_construction_on_string_params()
    {
        $params = (new ReflectionClass($this))->getConstants();

        $key = null;
        $value = null;

        $this->expectExceptionMessage('must be of the type string, null given,');

        foreach ($params as $key => $value) {
            $prior = $value;
            $params[$key] = null;

            new Investor($params['firstName'], $params['lastName'], $params['email']);

            $params[$key] = $prior;
        }
    }

    /**
     * tests if a null is passed to bool param(s) on Investor class
     * construction.
     *
     * @throws \Exception
     */
    public function test_fails_construction_on_none_bool_approved_value()
    {
        $dummyValue = null;

        $this->expectExceptionMessage('must be of the type boolean, null given,');

        /* @noinspection PhpStrictTypeCheckingInspection */
        new Investor(self::firstName, self::email, self::email, $dummyValue);
    }

    public function test_valid_email_address_constructed()
    {
        $this->setInvestor(
            new Investor(
                self::firstName,
                self::lastName,
                'bob@bob.com'
            )
        );

        $this->assertRegExp('/^.+\@\S+\.\S+$/', $this->getInvestor()->getEmail());
    }

    /**
     * @param Investor $investor
     *
     * @return InvestorTest
     */
    protected function setInvestor(Investor $investor): self
    {
        $this->investor = $investor;

        return $this;
    }

    /**
     * @return Investor
     */
    protected function getInvestor(): Investor
    {
        return $this->investor;
    }
}
