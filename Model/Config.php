<?php

declare(strict_types=1);

namespace Jh\PasswordPolicy\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface as StoreScopeInterface;

class Config
{
    public const XML_PATH_ENABLE_VALIDATION  = 'jh_password_policy/password/enable_validation';
    public const XML_PATH_MIN_PASSWORD_SCORE = 'jh_password_policy/password/minimum_password_strength';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function isValidationEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_ENABLE_VALIDATION, StoreScopeInterface::SCOPE_STORE);
    }

    public function getMinimumPasswordScore(): int
    {
        return (int) $this->scopeConfig->getValue(self::XML_PATH_MIN_PASSWORD_SCORE, StoreScopeInterface::SCOPE_STORE);
    }
}
