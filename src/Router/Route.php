<?php

namespace Yghareb\BaiscRouter\Router;

use App\ServiceContainer\Container;

class Route extends Router
{

    public static  ?Router $router;

    public function __construct()
    {

    }
    public static function get($path , callable|array $action)
    {
        $container  =  new Container();
        self::$router ??= new Router($container);
       self::$router->register('GET' ,  $path , $action );


    }

    public static function post($path , callable|array $action )
    {
        $container  =  new Container();
        self::$router ??= new Router($container);
      return  self::$router->register('POST' ,  $path , $action );
    }




}