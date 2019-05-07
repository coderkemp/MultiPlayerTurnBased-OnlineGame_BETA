<?php

session_start();

include "../classes/user.php";
$user = new user();
if($_SESSION['GameId']!=0){
    $user->DeleteGame($_SESSION['GameId']);
    $_SESSION['GameId']="";
}
?>

<!DOCTYPE html>
<html lang="en">
	<META HTTP-EQUIV=Refresh; 
	<head>
	<link rel="stylesheet" href="../style/Style.css">
		<title>Chat Application Home</title>
	</head>
	<body>
	<h2>Welcome <span style="color:green"><?php
	echo $_SESSION['UserName'];
	?></span></h2>
		<div id="AvailablePlayers">
		</div>
		
		<div id="ChatMessages">
		</div>
	<div id="ChatBig"> 
		<span style="color:green">Chat</span><br/>
		<textarea id="ChatText" name="ChatText"></textarea>
	</div>
    <script src="https://code.jquery.com/jquery-3.3.1.js"   integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="   crossorigin="anonymous"></script>
    <script src="../js/availablePlayers.js"></script>
	<script src="../js/chatbox.js"></script>
    </body>
</html> 