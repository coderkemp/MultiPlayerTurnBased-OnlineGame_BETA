<?php
	session_start();
	include "../classes/move.php";
	$lCol="";
	if(isset($_POST['MoveString'])){
		$move = new move();
		$move->setMoveUserId($_SESSION['UserId']);
		$lCol=$move->getColor($_SESSION['UserId']);
	}  
	$output = array("msg"=>"$lCol", "loggedin"=>"true");
	echo json_encode($output);

?>