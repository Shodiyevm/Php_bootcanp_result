<?php

use GuzzleHttp\Client;

require 'vendor/autoload.php';

class Bot
{
    const  string TOKEN = "7461377189:AAGWagLzd9FtiaVFOOPVjIhOZOnrW9jRtXM";
    const API   = "https://api.telegram.org/bot";

    public Client $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => self::API . self::TOKEN . "/"]);
    }

    public function STARTBOT($chatId)
    {
        $this->client->post('sendMessage', [
            'form_params' => [
                'chat_id' => $chatId,
                'text' => "Assalomu alaykum Nimalar bilan bandsiz...!"
            ]
        ]);
    }
    public function ADDBOT($chatId)
    {
        $this->client->post('sendMessage', [
            'form_params' => [
                'chat_id' => $chatId,
                'text' => "Add ishlayapdi..!"
            ]
        ]);
    }
}
