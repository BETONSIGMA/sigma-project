<?php

namespace Bebeton\Backend\Core;

use Attribute;

#[Attribute]
class Route
{
    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function getPath(): string
    {
        return $this->path;
    }
}