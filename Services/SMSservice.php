<?php

namespace Services;

class SMSservice implements BaseNotificationService
{
    public function notify(): string
    {
        return  "Sms";
    }
}