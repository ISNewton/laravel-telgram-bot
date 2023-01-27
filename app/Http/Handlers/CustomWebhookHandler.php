<?php

namespace App\Http\Handlers;


use Illuminate\Support\Stringable;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Keyboard\ReplyButton;
use DefStudio\Telegraph\Keyboard\ReplyKeyboard;
use DefStudio\Telegraph\Handlers\WebhookHandler;

class CustomWebhookHandler extends WebhookHandler
{
  public function myCustomHandler(Stringable $text): void
  {
    $this->chat->html("Received: $text")->send();
    $this->reply('this is your contact');
  }

  public function start()
  {
    $this->chat->markdown("Starting Newton bot :) !")->send();
  }

  public function hi()
  {
    $this->chat->html("Choose one:")
      ->keyboard(Keyboard::make()->buttons([
        Button::make('Delete')->action('delete')->param('id', '42'),
        Button::make('open')->url('https://test.it'),
        Button::make('Web App')->webApp('https://web-app.test.it'),
        Button::make('Login Url')->loginUrl('https://loginUrl.test.it'),
      ]))
      ->send();
    // $this->replaceKeyboard();
    // $this->reply(ReplyKeyboard::make()->buttons([
    //     ReplyButton::make('foo')->requestPoll(),
    //     ReplyButton::make('bar')->requestQuiz(),
    //     ReplyButton::make('baz')->webApp('https://webapp.dev'),
    //   ]))->send();
    // $this->chat->markdown("keyboard!")->keyboard(Keyboard::make()->buttons([
    //   Button::make('Delete')->action('delete')->param('id', '42'),
    //   Button::make('open')->url('https://test.it'),
    //   Button::make('Web App')->webApp('https://web-app.test.it'),
    //   Button::make('Login Url')->loginUrl('https://loginUrl.test.it'),
    // ]))->send();

  }

  protected function handleUnknownCommand( $text): void
  {
    // $this->replaceKeyboard(Keyboard::make()->buttons([
    //   Button::make('Delete')->action('delete')->param('id', '42'),
    //   Button::make('open')->url('https://test.it'),
    //   Button::make('Web App')->webApp('https://web-app.test.it'),
    //   Button::make('Login Url')->loginUrl('https://loginUrl.test.it'),
    // ]))
    // ;

    // $this->chat->html("I can't understand your command: $text")->send();
  }
}
