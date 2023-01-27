<?php

namespace DefStudio\Telegraph\Handlers;

use Illuminate\Support\Stringable;
use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Handlers\WebhookHandler;

class CustomWebhookHandler extends WebhookHandler
{
  public function myCustomHandler(Stringable $text): void
  {
    $this->chat->html("Received: $text")->send();
    $this->reply('this is your contact');
  }

  public function hi()
  {
    $this->chat->markdown("*Hi* happy to be here!")->send();
  }
}
