<?php
require "src/BoT.php";

$bot = new Bot();
if (isset($update->message)) {
    $message = $update->message;
    $chatId = $message->chat->id;
    $text = $message->text;

    if ($text === '/start') {
        $bot->STARTBOT($chatId);
        return;
    }

    if ($text === "/add"){
        $bot -> ADDBOT($chatId);
    }


}