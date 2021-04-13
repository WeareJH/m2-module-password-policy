<?php

declare(strict_types=1);

namespace Jh\PasswordPolicy\Validator;

use Jh\PasswordPolicy\Model\Config;
use Jh\PasswordPolicy\Model\Config\Source\PasswordScore;
use Jh\PasswordPolicy\Model\PasswordRepository;
use Magento\Framework\Exception\InputException;

class Password
{
    /**
     * @var PasswordRepository
     */
    private $passwordStrengthRepository;

    /**
     * @var Config
     */
    private $config;

    public function __construct(PasswordRepository $passwordStrengthRepository, Config $config)
    {
        $this->passwordStrengthRepository = $passwordStrengthRepository;
        $this->config = $config;
    }

    /**
     * @param string $password
     * @throws InputException
     */
    public function validate(string $password): void
    {
        if (!$this->config->isValidationEnabled()) {
            return;
        }

        $minimumScore = $this->config->getMinimumPasswordScore();
        $password     = $this->passwordStrengthRepository->get($password);
        $score        = $password->getScore();

        if ($score >= $minimumScore) {
            return;
        }

        switch ($score) {
            case PasswordScore::OPTION_STRONG:
                $message = implode(' ', [
                    'The password entered is strong but has not met the site\'s password policy.',
                    'Please enter a stronger password.'
                ]);
                throw new InputException(__($message));
            case PasswordScore::OPTION_MEDIUM:
                throw new InputException(
                    __('The password entered is somewhat guessable, please enter a stronger password.')
                );
            case PasswordScore::OPTION_WEAK:
            case PasswordScore::OPTION_VERY_WEAK:
                throw new InputException(
                    __('The password entered is too guessable, please enter a stronger password.')
                );
            default:
                break;
        }
    }
}
