<?php

declare(strict_types=1);

namespace Jh\PasswordPolicy\Plugin;

use Jh\PasswordPolicy\Validator\Password;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Customer\Model\AccountManagement;

class CheckPasswordStrengthPlugin
{
    /**
     * @var Password
     */
    private $passwordValidator;

    public function __construct(Password $passwordValidator)
    {
        $this->passwordValidator = $passwordValidator;
    }

    public function beforeResetPassword(AccountManagement $subject, $email, $resetToken, $newPassword): array
    {
        $this->passwordValidator->validate($newPassword);

        return [$email, $resetToken, $newPassword];
    }

    public function beforeCreateAccount(
        AccountManagement $subject,
        CustomerInterface $customer,
        $password = null,
        $redirectUrl = ''
    ): array {
        if ($password) {
            $this->passwordValidator->validate($password);
        }

        return [$customer, $password, $redirectUrl];
    }

    public function beforeChangePassword(
        AccountManagement $subject,
        $email,
        $currentPassword,
        $newPassword
    ): array {
        $this->passwordValidator->validate($newPassword);

        return [$email, $currentPassword, $newPassword];
    }

    public function beforeChangePasswordById(
        AccountManagement $subject,
        $customerId,
        $currentPassword,
        $newPassword
    ): array {
        $this->passwordValidator->validate($newPassword);

        return [$customerId, $currentPassword, $newPassword];
    }
}
