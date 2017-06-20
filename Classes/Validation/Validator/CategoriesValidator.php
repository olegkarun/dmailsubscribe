<?php

namespace DPN\Dmailsubscribe\Validation\Validator;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Björn Fromme <fromme@dreipunktnull.come>, 2017 Vitaliy <vitaliy@webberry.ua>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use DPN\Dmailsubscribe\Domain\Model\Subscription;
use DPN\Dmailsubscribe\Service\SettingsService;
use TYPO3\CMS\Extbase\Error\Result;
use TYPO3\CMS\Extbase\Object\ObjectManagerInterface;
use TYPO3\CMS\Extbase\Validation\Exception\InvalidSubjectException;
use TYPO3\CMS\Extbase\Validation\Validator\EmailAddressValidator;
use TYPO3\CMS\Extbase\Validation\Validator\GenericObjectValidator;
use TYPO3\CMS\Extbase\Validation\Validator\NotEmptyValidator;

/**
 * Validator: Subscription object validation wrapper
 *
 * Validates an entire Subscription instance using various other
 * Validators as configured in TypoScript.
 *
 * @package Dmailsubscribe
 * @subpackage Validation/Validator
 */
class CategoriesValidator extends NotEmptyValidator
{
    /**
     * @var \DPN\Dmailsubscribe\Service\SettingsService
     * @inject
     */
    protected $settingsService;

    /**
     * @var \TYPO3\CMS\Extbase\Object\ObjectManagerInterface
     * @inject
     */
    protected $objectManager;

    /**
     * @param \DPN\Dmailsubscribe\Service\SettingsService $settingsService
     * @return void
     */
    public function injectSettingsService(SettingsService $settingsService)
    {
        $this->settingsService = $settingsService;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Object\ObjectManagerInterface $objectManager
     * @return void
     */
    public function injectObjectManager(ObjectManagerInterface $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * Overrides parent::validate() to add notEmptyValidators
     * for all required fields and emailNotRegisteredValidator
     * to email field
     *
     * @param mixed $object
     * @throws InvalidSubjectException
     * @return Result
     */
    public function validate($object)
    {
        if (false === $this->canValidate($object)) {
            throw new InvalidSubjectException(sprintf('Expected array but was "%s"', get_class($object)));
        }

        $requiredFields = $this->settingsService->getSetting('requiredFields', [], ',');
        $object = array_filter($object);
        
        if(is_array($requiredFields) && in_array('categories', $requiredFields)) 
            return parent::validate($object);
    }

    /**
     * @param object $object
     * @return boolean
     */
    public function canValidate($object)
    {
        return is_array($object);
    }
}
