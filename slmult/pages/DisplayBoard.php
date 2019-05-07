<?php
  session_start();
  include "../classes/user.php";
  $user = new user();
  $user->setUserId($_SESSION["UserId"]);
  $user->DisplayBoard();
?>
