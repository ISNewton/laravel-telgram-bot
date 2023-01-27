<?php

namespace App\Http\Controllers;

use DefStudio\Telegraph\DTO\Message;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Keyboard\Keyboard;
use Telegram\Bot\Laravel\Facades\Telegram;
use DefStudio\Telegraph\Keyboard\ReplyButton;
use DefStudio\Telegraph\Keyboard\ReplyKeyboard;

class TelegramController extends Controller
{
    //
    public function index()
    {
        $response = Telegram::getMe();

        $botId = $response->getId();
        $firstName = $response->getFirstName();
        $username = $response->getUsername();
        dd($response, $botId, $firstName, $username);
        // Telegraph::chats()->create([
        //     'chat_id' => 1882204291,
        //     'name' => 'me',
        // ]);

        // Telegraph::chat(1882204291)->message('hello world')
        // ->getFile('https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png')
        // ->send();

        // Telegraph::message('hello world')
        //     ->keyboard(Keyboard::make()->buttons([
        //         Button::make("🗑️ Delete")->action("delete")->param('id', 2),
        //         Button::make("📖 Mark as Read")->action("read")->param('id', 2),
        //         Button::make("👀 Open")->url('https://test.it'),
        //     ])->chunk(2))->send();
    }
}
