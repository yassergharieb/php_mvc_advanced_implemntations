<?php


use Yghareb\BaiscRouter\Router\Route;

require __DIR__ . '/vendor/autoload.php';


$container =  new  \App\ServiceContainer\Container();

  $Router =  new \Yghareb\BaiscRouter\Router\Router($container);





  $route =    Yghareb\BaiscRouter\Router\Route::get('/test' ,
                [\Yghareb\BaiscRouter\Classes\Home::class , 'hello']);

$Router->resolve($_SERVER['REQUEST_URI'] , $_SERVER['REQUEST_METHOD']);