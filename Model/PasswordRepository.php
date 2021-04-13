<?php

declare(strict_types=1);

namespace Jh\PasswordPolicy\Model;

use Jh\PasswordPolicy\Api\Data\PasswordInterface;
use Jh\PasswordPolicy\Api\PasswordRepositoryInterface;
use Jh\PasswordPolicy\Model\PasswordFactory;
use Magento\Framework\Api\DataObjectHelper;
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

    /**
     * @var DataObjectHelper
     */
    private $dataObjectHelper;

    public function __construct(
        StrengthEstimator $strengthEstimator,
        PasswordFactory $passwordFactory,
        DataObjectHelper $dataObjectHelper
    ) {
        $this->strengthEstimator = $strengthEstimator;
        $this->passwordFactory   = $passwordFactory;
        $this->dataObjectHelper  = $dataObjectHelper;
    }

    public function get(string $password): PasswordInterface
    {
        $passwordStrengthDataObject = $this->passwordFactory->create();

        $this->dataObjectHelper->populateWithArray(
            $passwordStrengthDataObject,
            $this->strengthEstimator->passwordStrength($password),
            PasswordInterface::class
        );

        return $passwordStrengthDataObject;
    }
}
