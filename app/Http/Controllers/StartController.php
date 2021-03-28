<?php

namespace App\Http\Controllers;

use App\Conversations\GreetingConversation;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\Drivers\Telegram\Extensions\Keyboard;
use BotMan\Drivers\Telegram\Extensions\KeyboardButton;
use Illuminate\Http\Request;

class StartController extends Controller
{
    public function start(BotMan $bot)
    {
        $userName = $bot->getUser()->getFirstName() . ' ' . $bot->getUser()->getLastName();
        $greetings = "Hi, {$userName}!\nI glad to see you here!\nI will help you to learn English!";
        $bot->reply($greetings);
        $bot->startConversation(new GreetingConversation());
    }
}
