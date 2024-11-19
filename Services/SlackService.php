<?php

namespace Services;

class SlackService  implements  BaseNotificationService
{


    public function notify(): string
    {
        return  "slack";
    }
}