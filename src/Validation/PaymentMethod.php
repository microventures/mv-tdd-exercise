<?php

declare(strict_types=1);

namespace App\Validation;

use Exception;

/**
 * Class PaymentMethod.
 */
class PaymentMethod
{
    /** @var string */
    const CASH = 'cash';
    /** @var string */
    const CHECK = 'check';
    /** @var string */
    const CREDIT = 'credit';

    /** @var array */
    private $paymentMethods = [
        self::CASH,
        self::CHECK,
        self::CREDIT,
    ];

    /** @var string */
    private $paymentMethod;

    /**
     * PaymentMethod constructor.
     *
     * @param string $paymentMethod
     *
     * @throws Exception
     */
    public function __construct(string $paymentMethod)
    {
        if ( ! \in_array($paymentMethod, $this->paymentMethods, true)) {
            throw new Exception('not a valid payment method');
        }

        $this->setPaymentMethod($paymentMethod);
    }

    /**
     * @return string
     */
    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    /**
     * @param string $paymentMethod
     *
     * @return PaymentMethod
     */
    private function setPaymentMethod(string $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }
}
