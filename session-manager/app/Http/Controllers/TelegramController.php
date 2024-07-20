<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $update = Telegram::commandsHandler(true);
        return 'ok';
    }
}

use Telegram\Bot\Api;

$telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
$response = $telegram->setWebhook(['url' => 'https://iralean.com/telegram/webhook']);
