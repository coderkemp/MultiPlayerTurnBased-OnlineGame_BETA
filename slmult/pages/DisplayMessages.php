<?php
  session_start();
  include "../classes/chat.php";
  $chat=new chat();
  $chat->setChatUserId($_SESSION['UserId']);
  $chat->setChatGameId($_SESSION['GameId']);
  $chat->DisplayMessage();
?>
