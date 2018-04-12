<?php

namespace App\Exception;

use App\Exception\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;

class ValidationException extends \Exception
{
    public $success = 'false';

    /** @var ConstraintViolation[] */
    public $violations;

    public function __construct(ConstraintViolationList $violations)
    {
        foreach ($violations as $violation) {
            $this->violations[] = new ConstraintViolation($violation->getPropertyPath(), $violation->getMessage());
        }
    }
}