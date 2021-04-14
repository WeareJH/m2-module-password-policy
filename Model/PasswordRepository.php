<?php

declare(strict_types=1);

namespace Jh\PasswordPolicy\Model;

use Jh\PasswordPolicy\Api\Data\PasswordInterface;
use Jh\PasswordPolicy\Api\PasswordRepositoryInterface;
use Jh\PasswordPolicy\Model\PasswordFactory;
use ZxcvbnPhp\Zxcvbn as StrengthEstimator;

class PasswordRepository implements PasswordRepositoryInterface
{
    /**
     * @var StrengthEstimator
     */
    private $strengthEstimator;

    /**
     * @var PasswordFactory
     */
    private $passwordFactory;

    public function __construct(
        StrengthEstimator $strengthEstimator,
        PasswordFactory $passwordFactory
    ) {
        $this->strengthEstimator = $strengthEstimator;
        $this->passwordFactory   = $passwordFactory;
    }

    public function get(string $password): PasswordInterface
    {
        return $this->passwordFactory->create(['data' => $this->strengthEstimator->passwordStrength($password)]);
    }
}
