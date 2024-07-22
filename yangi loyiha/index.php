<?php
$update = json_decode(file_get_contents('php://input'));
if (isset($update->message)) {
    require "bot/bot.php";
    return;
}
require "src/DB.php";
require "src/Todo.php";
$pdo = DB::connect();

$todo = new TODO($pdo);

if (!empty($_POST) || !empty($_GET)) {
    if (isset($_POST['text'])) {
        $todo->SETTODO($_POST['text']);
        header('Location:  index.php');
    }
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $todo->DELETTODO($id);
    }
    if (isset($_GET['complete'])) {
        echo $_GET['comlete'];
        $todo->complete($_GET['complete']);
    }
    if (isset($_GET['uncompleted'])) {
        echo $_GET['uncompleted'];
        $todo->uncompleted($_GET['uncompleted']);
    }
}




require "view/view.php";