<?php

declare(strict_types=1);

namespace Bebeton\Backend\Core\Models;

class ClassMethod
{
    private string $methodName;

    private string $className;

    public function getMethodName(): string
    {
        return $this->methodName;
    }

    public function setMethodName(string $methodName): self
    {
        $this->methodName = $methodName;
        return $this;
    }

    public function getClassName(): string
    {
        return $this->className;
    }

    public function setClassName(string $className): self
    {
        $this->className = $className;
        return $this;
    }   
} 