<?php

namespace App\Console\Commands;

use Telegram\Bot\Commands\Command;

class StartCommand extends Command
{
    protected $name = "start";

    protected $description = "Start Command to get you started";

    public function handle()
    {
        $this->replyWithMessage(['text' => 'Welcome to our Telegram bot!']);
    }
}
