<?php

declare(strict_types=1);


namespace App\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\UnexpectedTypeException;

/**
 * This file is part of VinceTAdminConfigurationBundle for Symfony2
 *
 * @category VinceT
 * @package  VinceTAdminConfigurationBundle
 * @author   Vincent Touzet <vincent.touzet@gmail.com>
 * @license  MIT License view the LICENSE file that was distributed with this source code.
 * @link     https://github.com/vincenttouzet/AdminConfigurationBundle
 */
class StringToDateTimeTransformer implements DataTransformerInterface
{
    /**
     * @param string $value
     *
     * @return \DateTime|mixed
     * @throws \Exception
     */
    public function transform($value = null)
    {
        $value = $value ?? 'now';
        return new \DateTime($value);
    }
    /**
     * Transforms a DateTime into a string.
     *
     * @param \DateTime $value DateTime value.
     *
     * @return string String value.
     *
     * @throws UnexpectedTypeException if the given value is not a DateTime
     */
    public function reverseTransform($value)
    {
        return $value->format('Y-m-d');
    }
}