<?php

declare(strict_types=1);

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class UniqueSelect
 * @package App\Validator\Constraints
 */
class UniqueSelect extends Constraint
{
    public $message = 'Duplicate select';

}