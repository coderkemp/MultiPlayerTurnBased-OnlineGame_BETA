<?php
session_start();
echo "I am in Userlogin page!!";
include "../classes/user.php";
$user = new user();
if (!empty($_SESSION['username'])) {
   $user->setUserName($_SESSION['username']);
}
else{
      error_log("error picking username", 0);
}
if (!empty($_SESSION['password'])) {
   $user->setUserPassword($_SESSION['password']); // fix was added in register.php
}
else{
      error_log("error picking password", 0);
}
if($user->UserLogin()==true){
   $_SESSION['UserId']=$user->getUserId();
   $_SESSION['UserName']=$user->getUserName();
   $_SESSION['GameId']=$user->getUserGameId();
   $_SESSION['Opponent']=$user->getUserGameOpponent();
   $_SESSION['Color']=$user->getUserGameColor();
}
?> 