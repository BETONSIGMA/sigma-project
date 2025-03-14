<?php

require_once __DIR__ . '/vendor/autoload.php';

use Bebeton\Backend\Controllers\AboutController;
use Bebeton\Backend\Controllers\AdminController;
use Bebeton\Backend\Controllers\HomeController;
use Bebeton\Backend\Core\Route;
use Bebeton\Backend\Core\Response;
use Bebeton\Backend\Core\RequestFactory;
use Bebeton\Backend\Core\Models\ClassMethod;

$request = RequestFactory::create();

$homeController = new HomeController();
$aboutController = new AboutController();
$adminController = new AdminController();

/** @var array<class-string> $controllers */
$controllers = [
    HomeController::class,
    AboutController::class,
    AdminController::class,
];

/** @var array<string, ClassMethod> $routeClassMethodMap */
$routeClassMethodMap = [];

foreach ($controllers as $controller) {
    $reflection = new ReflectionClass($controller);
    foreach ($reflection->getMethods() as $method) {
        foreach ($method->getAttributes() as $attribute) {
            if ($attribute->getName() === Route::class) {
                $classMethod = new ClassMethod();
                $classMethod->setMethodName($method->getName());
                $classMethod->setClassName($controller);
                $routeClassMethodMap[$attribute->getArguments()[0]] = $classMethod;
            }
        }
    }       
}

if (!isset($routeClassMethodMap[$request->getUri()])) {
    $response = new Response();
    $response->status = 404;
    $response->body = file_get_contents(__DIR__ . '/views/404.bebeton.html');
} else {
    $classMethod = $routeClassMethodMap[$request->getUri()];
    $className = $classMethod->getClassName();
    $methodName = $classMethod->getMethodName();

    $class = new $className();

    $response = $class->$methodName();

}

echo $response;