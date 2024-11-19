<?php

namespace Services;

class PaymentService
{
    public function __construct (
        protected EmailService $emailService
        , protected  SlackService $slackService
        , protected  SMSservice $SMSservice)
    {

    }


    public function process()
    {
         $x =  $this->emailService->notify();
         $a =  $this->slackService->notify();
         $b =    $this->SMSservice->notify();
         echo "this is works!;";
       return [$x , $b , $a];
    }
}