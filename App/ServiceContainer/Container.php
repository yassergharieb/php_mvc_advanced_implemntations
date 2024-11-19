<?php

namespace App\ServiceContainer;

use http\Exception;
use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{


    public $entries;
      public function get(string $id)
    {
        if($this->has($id)) {
            $entry =   $this->entries[$id];
            return $entry($this);
        }


      return  $this->resolve($id);
    }

     public function has(string $id): bool
    {
         return   isset($this->entries[$id]);
    }


    public function register(string $id ,  callable $concrete  )
    {

        $this->entries[$id] =  $concrete;
    }

    private function resolve(string $id)
    {

        $reflectionClass =  new  \ReflectionClass($id);

        if(! $reflectionClass->isInstantiable()) {
            return throw new \Exception('class' .  $id  . 'is not instantiable');
        }

        $constructor =  $reflectionClass->getConstructor();

        if(! $constructor) {
            return  new  $id;
        }

        $params =  $constructor->getParameters();
        if(!$params) {
            return  new $id;
        }


        $dependencies= array_map(function (\ReflectionParameter $parameter) {
           $name  =  $parameter->getName();
           $type =  $parameter->getType();

           if (!$type ) {
               throw  new  \Exception('class ' . $name .  'type hint is missing');
           }

            if ($type instanceof  \ReflectionUnionType ) {
                throw  new  \Exception('class ' . $name .  'type hint is missing');
            }

            if ($type instanceof  \ReflectionNamedType && !$type->isBuiltin() ) {
              return   $this->get($type->getName());
            }

            throw  new  \Exception('class is not found');

        },  $params);


         return $reflectionClass->newInstanceArgs($dependencies);
    }
}