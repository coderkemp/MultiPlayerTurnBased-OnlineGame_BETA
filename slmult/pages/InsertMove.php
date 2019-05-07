<?php
session_start();
include "../classes/move.php";
	$lMove="rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1";
	if(isset($_POST['MoveString'])){
		$move = new move();
		$move->setMoveUserId($_SESSION['UserId']);
		$move->setMoveString($_POST['MoveString']);
		$move->InsertMove($_SESSION['GameId']);
		$lMove=$move->getLastMove($_SESSION['GameId']);
	}
	$output = array("msg"=>"$lMove", "loggedin"=>"true");
	echo json_encode($output);
?>