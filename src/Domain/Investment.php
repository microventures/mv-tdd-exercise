<?php

declare(strict_types=1);

namespace App\Domain;

use App\Validation\PaymentMethod;

/**
 * Class Investment.
 */
class Investment
{
    /**
     * @var int
     */
    private $amount;
    /**
     * @var string
     */
    private $paymentMethod;

    /**
     * Investment constructor.
     *
     * @param int           $amount
     * @param PaymentMethod $paymentMethod
     */
    public function __construct(int $amount, PaymentMethod $paymentMethod)
    {
        $this->setAmount($amount);
        $this->setPaymentMethod($paymentMethod->getPaymentMethod());
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    /**
     * @param int $amount
     *
     * @return Investment
     */
    private function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param string $paymentMethod
     *
     * @return Investment
     */
    private function setPaymentMethod(string $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }
}
