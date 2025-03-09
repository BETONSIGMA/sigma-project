<?php

declare(strict_types=1);

namespace Bebeton\Backend\Core;
use Bebeton\Backend\Core\Enum\HttpMethod;
use Bebeton\Backend\Core\Request;

class RequestFactory
{
    public static function create()
    {
        $httpMethod = HttpMethod::tryFrom($_SERVER['REQUEST_METHOD']);
        if($httpMethod === null){
            throw new \Exception('ХТТП метод недоступен');
        }

        $request = new Request(
            $httpMethod,
            $_SERVER['REQUEST_URI'],
            $_SERVER['SERVER_PROTOCOL'],
        );
        
        return $request;
    }
}