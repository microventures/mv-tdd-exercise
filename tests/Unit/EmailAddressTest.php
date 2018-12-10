<?php

declare(strict_types=1);

namespace tests\Unit;

use App\Validation\EmailAddress;
use PHPUnit\Framework\TestCase;

class EmailAddressTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function test_valid_email_address()
    {
        $emailAddress = 'bob@bob.com';

        $this->assertSame($emailAddress, (new EmailAddress($emailAddress))->getEmailAddress());
    }

    /**
     * @throws \Exception
     */
    public function test_invalid_email_address()
    {
        $emailAddress = 'bob@bob.';

        $this->expectExceptionMessage('invalid email address found.');

        new EmailAddress($emailAddress);
    }
}
