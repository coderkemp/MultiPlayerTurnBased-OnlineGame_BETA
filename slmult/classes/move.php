<?php
class move {
	private $MoveId,$MoveUserId,$MoveString,$LastMove, $PlayerTurn;
	
	public function getMoveId(){
		return $this->MoveId;
	}
	public function setMoveId($MoveId){
		return $this->MoveId=$MoveId;
	}	
	
	public function getMoveUserId(){
		return $this->MoveUserId;
	}
	public function setMoveUserId($MoveUserId){
		return $this->MoveUserId=$MoveUserId;
	}	
	
	public function getMoveString(){
		return $this->MoveString;
	}
	public function setMoveString($MoveString){
		return $this->MoveString=$MoveString;
	}	
    
    public function getPlayerTurn(){
		return $this->PlayerTurn;
	}
	public function setPlayerTurn($PlayerTurn){
		return $this->PlayerTurn=$PlayerTurn;
	}	
	
	public function getLastMove($id){
		include "../../connectToDB.php";
		$MoveRequest=$_db->query("SELECT * FROM users ORDER BY UserId");
		$existCount = $MoveRequest->rowCount();
		
		if ($existCount == 0) { // evaluate the count
			return "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1";
		}
		if ($existCount > 0) {
			while($row = $MoveRequest->fetch(PDO::FETCH_ASSOC)){
				$gameID = $row["GameId"];	
				$move = $row["MoveString"];					
				if($gameID == $id) {
					return $move;
	
				}
			}
		}
		$move="rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1";
		return $move;
	}
	
	public function getColor($id){
		include "../../connectToDB.php";

		$ColRequest=$_db->query("SELECT * FROM users ORDER BY UserId");
		$existCount = $ColRequest->rowCount();
		
		if ($existCount == 0) { // evaluate the count
			return "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1";
		}
		if ($existCount > 0) {
			while($row = $ColRequest->fetch(PDO::FETCH_ASSOC)){
				$userID = $row["UserId"];				
				$col = $row["GameColor"];					
				if($userID == $id) {
					return $col;
	
				}
			}
		}
		$col="";
		return $col;
	}

	public function InsertMove($id){
		include "../../connectToDB.php";

		$MoveUserId=$this->getMoveUserId();
		$MoveString=$this->getMoveString();
		$MoveId =1;	
		$MoveRequest=$_db->query("SELECT * FROM users ORDER BY UserId LIMIT 1");
		$existCount = $MoveRequest->rowCount();
		if ($existCount == 0) { // evaluate the count
			return "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1";
		}
		if ($existCount > 0) {
			while($row = $MoveRequest->fetch(PDO::FETCH_ASSOC)){
				$MoveInsert =$_db->prepare("UPDATE users SET MoveString=? WHERE GameId=?");
				$MoveInsert->execute(array($MoveString,$id));
			}
		}
	}
    
    public function InsertDiceUpdate($id){
		include "../../connectToDB.php";

		$MoveUserId=$this->getMoveUserId();
		$DiceUpdate=$this->getPlayerTurn();
		$MoveId =1;	
		$MoveRequest=$_db->query("SELECT * FROM users ORDER BY UserId LIMIT 1");
		$existCount = $MoveRequest->rowCount();
		if ($existCount == 0) { // evaluate the count
			return "No Update Here";
		}
		if ($existCount > 0) {
			while($row = $MoveRequest->fetch(PDO::FETCH_ASSOC)){
				$DiceValInsert =$_db->prepare("UPDATE users SET latestMove=? WHERE GameId=?");
				$DiceValInsert->execute(array($DiceUpdate,$id));
			}
		}
	}
}
?>