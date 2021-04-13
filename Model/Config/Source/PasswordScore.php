<?php

declare(strict_types=1);

namespace Jh\PasswordPolicy\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class PasswordScore implements OptionSourceInterface
{
    public const OPTION_VERY_WEAK   = 0;
    public const OPTION_WEAK        = 1;
    public const OPTION_MEDIUM      = 2;
    public const OPTION_STRONG      = 3;
    public const OPTION_VERY_STRONG = 4;

    public function toOptionArray(): array
    {
        return [
            [
                'value' => self::OPTION_VERY_WEAK,
                'label' => __('Very Weak')
            ],
            [
                'value' => self::OPTION_WEAK,
                'label' => __('Weak')
            ],
            [
                'value' => self::OPTION_MEDIUM,
                'label' => __('Medium')
            ],
            [
                'value' => self::OPTION_STRONG,
                'label' => __('Strong')
            ],
            [
                'value' => self::OPTION_VERY_STRONG,
                'label' => __('Very Strong')
            ]
        ];
    }
}
