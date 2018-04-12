<?php

namespace App\Entity;

class Item
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \DateTimeImmutable
     */
    private $created;

    public function __construct(string $name, string $content)
    {
        $this->name = $name;
        $this->content = $content;
        $this->created = new \DateTimeImmutable('now');
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getContent() : string
    {
        return $this->content;
    }

    public function getCreated() : \DateTimeImmutable
    {
        return $this->created;
    }
}