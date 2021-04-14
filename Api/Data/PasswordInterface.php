<?php

declare(strict_types=1);

namespace Jh\PasswordPolicy\Api\Data;

use Jh\PasswordPolicy\Api\Data\PasswordExtensionInterface;
use Magento\Framework\Api\ExtensibleDataInterface;

interface PasswordInterface extends ExtensibleDataInterface
{
    public const PASSWORD = 'password';
    public const GUESSES = 'guesses';
    public const SEQUENCE = 'sequence';
    public const CRACK_TIMES_SECONDS = 'crack_times_seconds';
    public const CRACK_TIMES_DISPLAY = 'crack_times_display';
    public const SCORE = 'score';
    public const FEEDBACK = 'feedback';
    public const CALCULATION_TIME = 'calc_time';

    /**
     * @return string|null
     */
    public function getPassword(): ?string;

    /**
     * @return int|null
     */
    public function getGuesses(): ?int;

    /**
     * @return array|null
     */
    public function getSequence(): ?array;

    /**
     * @return array|null
     */
    public function getCrackTimesSeconds(): ?array;

    /**
     * @return array|null
     */
    public function getCrackTimesDisplay(): ?array;

    /**
     * Get password score
     * @return int
     */
    public function getScore(): int;

    /**
     * @return array|null
     */
    public function getFeedback(): ?array;

    /**
     * @return float|null
     */
    public function getCalculationTime(): ?float;

    /**
     * @return \Jh\PasswordPolicy\Api\Data\PasswordExtensionInterface|null
     */
    public function getExtensionAttributes(): ?PasswordExtensionInterface;

    /**
     * @param \Jh\PasswordPolicy\Api\Data\PasswordExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(PasswordExtensionInterface $extensionAttributes): PasswordInterface;
}
