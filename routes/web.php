<?php

use Illuminate\Support\Facades\Route;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Keyboard\Keyboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // dd(Telegraph::registerWebhook()->send());
    Telegraph::message('hello world')
    ->keyboard(Keyboard::make()->buttons([
        Button::make("🗑️ Delete")->action("delete")->param('id', 2),  
        Button::make("📖 Mark as Read")->action("read")->param('id', 2),  
        Button::make("👀 Open")->url('https://test.it'),  
    ])->chunk(2))->send();

    Telegraph::html("<strong>Hello!</strong>\n\nI'm here!")->send();
});
