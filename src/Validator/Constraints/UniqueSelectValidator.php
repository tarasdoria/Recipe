<?php

declare(strict_types=1);

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

/**
 * Class UniqueSelectValidator
 * @package App\Validator\Constraints
 */
class UniqueSelectValidator extends ConstraintValidator
{
    /**
     * @param mixed      $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof UniqueSelect) {
            throw new UnexpectedTypeException($constraint, UniqueSelect::class);
        }

        if ($value->getId() > 1) {
            $this->context->buildViolation($constraint->message)
                ->atPath('ingredient')
                ->addViolation();
        }
    }
}