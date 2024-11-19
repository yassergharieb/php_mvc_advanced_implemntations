<?php

namespace App;


use App\ServiceContainer\Container;
use Services\EmailService;
use Services\PaymentService;
use Services\SlackService;
use Services\SMSservice;


class App
{

    public  static Container $container;
    public static function init(): void
    {
//        if (!isset(static::$container)) {
//            static::$container = new Container();
//
//            static::$container->register(PaymentService::class, function (Container $c) {
//                return new PaymentService(
//                    $c->get(EmailService::class),
//                    $c->get(SlackService::class),
//                    $c->get(SMSservice::class)
//                );
//            });
//            static::$container->register(EmailService::class, fn() =>  new  EmailService());
//            static::$container->register(SlackService::class, fn() =>  new SlackService());
//            static::$container->register(SMSservice::class, fn() =>  new SMSservice());
//        }
    }


    public static function getContainer(): Container
    {
//        static::init();  // Ensure the container is initialized
//        return static::$container;
    }



}