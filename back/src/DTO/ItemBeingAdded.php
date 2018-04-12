<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class ItemBeingAdded
{
    /**
     * @var string
     * @Assert\NotBlank()
     */
    public $name;
    /**
     * @var string
     * @Assert\NotBlank()
    */
    public $content;
}