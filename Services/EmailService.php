<?php

namespace Services;

class EmailService implements  BaseNotificationService
{
    public function notify(): string
    {
        return  "Email";
    }
}