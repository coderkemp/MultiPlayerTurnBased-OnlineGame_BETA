<?php
session_start();
include "../classes/move.php";
	$lMove="NO UPDATE";
	if(isset($_POST['playerDiceRoll'])){
		$move = new move();
		$move->setMoveUserId($_SESSION['UserId']);
		$move->setPlayerTurn($_POST['playerDiceRoll']);
		$move->InsertDiceUpdate($_SESSION['GameId']);
		$lMove=$move->getLastMove($_SESSION['GameId']);
	}
	$output = array("msg"=>"$lMove", "loggedin"=>"true");
	echo json_encode($output);
?>