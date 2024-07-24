<?php

use GuzzleHttp\Client;

class Bot
{
    const TOKEN = "7461377189:AAEOiA7w5wgvkjyOIIihO0DwdKv-NcT0n3s";  
    const API = "https://api.telegram.org/bot";

    private Client $client;
    private PDO $pdo;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => self::API . self::TOKEN . "/"]);
        $this->pdo = $this->connectDB(); 
    }

    public function startBot($chatId): void
    {
        try {
            $response = $this->client->post('sendMessage', [
                'form_params' => [
                    'chat_id' => $chatId,
                    'text' => "Assalomu alaykum, nimalar bilan bandsiz...!"
                ]
            ]);

            if ($response->getStatusCode() !== 200) {
                error_log("Failed to send message: " . $response->getBody());
            }
        } catch (GuzzleHttp\Exception\RequestException $e) {
            error_log("Request Exception: " . $e->getMessage());
        }
    }

    private function connectDB(): PDO
    {
        $dsn = 'mysql:host=localhost;dbname=todoapp';
        $username = 'root';
        $password = '2224';

        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}

$bot = new Bot();
$chatId = 123456789; 
$bot->startBot($chatId);
