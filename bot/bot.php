    <?php

    $bot = new Bot();
    if (isset($update->message)) {
        $message = $update->message;
        $chatId = $message->chat->id;
        $text = $message->text;

        if ($text === '/start') {
            $bot->startBot($chatId);
            return;
        }

        if ($text === "/add"){
            $bot -> addBot($chatId);
            return;
        }
    }

