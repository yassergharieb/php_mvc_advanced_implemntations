<?php
namespace  Yghareb\BaiscRouter\Router;

use App\ServiceContainer\Container;

class Router
{

    public function  __construct( public  Container $container)
    {

    }
    protected static  $routes =  [];
   public static function register($request_method,string $route ,callable|array $action ) :self
   {

       $path_array =  explode('/', $route );
       $route =  $path_array[1];


          self::$routes[$request_method][$route] =  $action;
//          var_dump($this->routes[$request_method][$route]);
//          die();
          return new self(new  Container());
   }


   public function resolve(string $requestUri , $requestMethod)
   {


        $route =  explode('/' ,  $requestUri)[2];

//        var_dump($route, self::$routes[$requestMethod]);
//        die();

        $action =  self::$routes[$requestMethod][$route] ?? null;
        if(!$action){
            throw  new  \Exception("not found action");
        }

        if (is_callable($action)) {
            return call_user_func($action);
        }

        if (is_array($action)){
            [$class , $method] =  $action;

            if(class_exists($class)) {

                $class  =   $this->container->get($class);
                if(method_exists($class , $method )) {
                    return call_user_func_array([$class , $method] , []) ;
                }
            }
            throw new \Exception('class' .$class . 'not found');

        }
       throw new \Exception('class not found');
//        echo $route;
   }



}