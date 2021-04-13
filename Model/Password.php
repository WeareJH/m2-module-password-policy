<?php

declare(strict_types=1);

namespace Jh\PasswordPolicy\Model;

use Jh\PasswordPolicy\Api\Data\PasswordExtensionInterface;
use Jh\PasswordPolicy\Api\Data\PasswordInterface;
use Magento\Framework\Api\AbstractExtensibleObject;

class Password extends AbstractExtensibleObject implements PasswordInterface
{
    public function getPassword(): ?string
    {
        return $this->_get(self::PASSWORD);
    }

    public function getGuesses(): int
    {
        return (int) $this->_get(self::GUESSES);
    }

    public function getSequence(): ?array
    {
        return $this->_get(self::SEQUENCE);
    }

    public function getCrackTimesSeconds(): ?array
    {
        return $this->_get(self::CRACK_TIMES_SECONDS);
    }

    public function getCrackTimesDisplay(): ?array
    {
        return $this->_get(self::CRACK_TIMES_DISPLAY);
    }

    public function getScore(): int
    {
        return (int) $this->_get(self::SCORE);
    }

    public function getFeedback(): ?array
    {
        return $this->_get(self::FEEDBACK);
    }

    public function getCalculationTime(): ?float
    {
        return $this->_get(self::CALCULATION_TIME);
    }

    public function getExtensionAttributes(): ?PasswordExtensionInterface
    {
        return $this->_getExtensionAttributes(); // @codingStandardsIgnoreLine
    }

    public function setExtensionAttributes(PasswordExtensionInterface $extensionAttributes): PasswordInterface
    {
        return $this->_setExtensionAttributes($extensionAttributes); // @codingStandardsIgnoreLine
    }
}
