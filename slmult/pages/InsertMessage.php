<?php
session_start();
include "../classes/chat.php";

if(isset($_POST['ChatText'])){
    $chat = new chat();
    $chat->setChatUserId($_SESSION['UserId']);
    $chat->setChatGameId($_SESSION['GameId']);
    $chat->setChatText($_POST['ChatText']);
    $chat->InsertChatMessage();
}
?>