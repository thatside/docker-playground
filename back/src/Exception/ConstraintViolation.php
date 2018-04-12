<?php

namespace App\Exception;

class ConstraintViolation
{
    public $propertyPath;
    public $message;

    public function __construct(string $propertyPath, string $message)
    {
        $this->propertyPath = $propertyPath;
        $this->message = $message;
    }
}