<?php

declare(strict_types=1);

namespace Jh\PasswordPolicy\Api;

use Jh\PasswordPolicy\Api\Data\PasswordInterface;

interface PasswordRepositoryInterface
{
    /**
     * Retrieve password strength
     * @param string $password
     * @return \Jh\PasswordPolicy\Api\Data\PasswordInterface
     */
    public function get(string $password): PasswordInterface;
}
