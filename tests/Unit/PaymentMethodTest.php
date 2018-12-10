<?php

declare(strict_types=1);

namespace tests\Uint;

use App\Validation\PaymentMethod;
use PHPUnit\Framework\TestCase;

class PaymentMethodTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function test_cash_payment_method()
    {
        $myPaymentMethod = PaymentMethod::CASH;

        $paymentMethod = new PaymentMethod($myPaymentMethod);

        $this->assertSame($myPaymentMethod, $paymentMethod->getPaymentMethod());
    }

    /**
     * @throws \Exception
     */
    public function test_check_payment_method()
    {
        $myPaymentMethod = PaymentMethod::CHECK;

        $paymentMethod = new PaymentMethod($myPaymentMethod);

        $this->assertSame($myPaymentMethod, $paymentMethod->getPaymentMethod());
    }

    /**
     * @throws \Exception
     */
    public function test_credit_payment_method()
    {
        $myPaymentMethod = PaymentMethod::CREDIT;

        $paymentMethod = new PaymentMethod($myPaymentMethod);

        $this->assertSame($myPaymentMethod, $paymentMethod->getPaymentMethod());
    }

    /**
     * @throws \Exception
     */
    public function test_invalid_payment_method()
    {
        $myPaymentMethod = 'bob';

        $this->expectExceptionMessage('not a valid payment method');

        new PaymentMethod($myPaymentMethod);
    }
}
