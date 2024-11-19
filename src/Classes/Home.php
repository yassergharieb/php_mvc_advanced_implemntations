<?php

namespace Yghareb\BaiscRouter\Classes;


use App\App;
use App\ServiceContainer\Container;
use Services\PaymentService;

class Home
{

    public  function  __construct( private  PaymentService $paymentService)
    {

    }
      public function hello()
      {

        return    $this->paymentService->process();
//       var_dump(  App::getContainer()->get(PaymentService::class)->process());

//               ->get(PaymentService::class)->process();
//         echo  'helllo';
      }
}