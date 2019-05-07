<?php
class user{
	private $UserId,$UserName,$UserMail,$UserGameId,$UserPassword,$UserGameColor,$UserGameOpponent;
	
	public function getUserId(){
		return $this->UserId;
	}
	public function setUserId($UserId){
		return $this->UserId=$UserId;
	}
	
	public function getUserName(){
		return $this->UserName;
	}
	public function setUserName($UserName){
		return $this->UserName=$UserName;
	}
	
	public function getUserMail(){
		return $this->UserMail;
	}
	public function setUserMail($UserMail){
		return $this->UserMail=$UserMail;
	}
	
	public function getUserPassword(){
		return $this->UserPassword;
	}
	public function setUserPassword($UserPassword){
		return $this->UserPassword=$UserPassword;
	}
	public function getUserGameId(){
		return $this->UserGameId;
	}
	public function setUserGameId($UserGameId){
		return $this->UserGameId=$UserGameId;
	}
	
	public function getUserGameOpponent(){
		return $this->UserGameOpponent;
	}
	public function setUserGameOpponent($UserGameOpponent){
		return $this->UserGameOpponent=$UserGameOpponent;
	}
	public function getUserGameColor(){
		return $this->UserGameColor;
	}
	public function setUserGameColor($UserGameColor){
		return $this->UserGameColor=$UserGameColor;
	}
	
	public function InsertUser(){
		include "../../connectToDB.php";
		$UserInsert=$_db->prepare("INSERT INTO users (UserName,UserPassword) 
		VALUES (:UserName,:UserPassword)");
		
		$UserInsert->execute(array(
		'UserName'=>$this->getUserName(), 
		'UserPassword'=>$this->getUserPassword() 
		));	
	}
	public function UserLogin(){
		include "../../connectToDB.php";
		$UserRequest=$_db->prepare("SELECT * FROM users WHERE UserName=:UserName AND UserPassword=:UserPassword");
		$UserRequest->execute(array(
		'UserName'=>$this->getUserName(), 
		'UserPassword'=>$this->getUserPassword()  
		));	
		if($UserRequest->rowCount()==0){
            header("Location: ../snakeLadder.php?error=1");
			return false;
		} else {
			while($row=$UserRequest->fetch()){
				$this->setUserId($row['UserId']);
				$this->setUserGameId($row['GameId']);
				$this->setUserGameOpponent($row['GameOpponent']);
				$this->setUserGameColor($row['GameColor']);
				if ($row["GameId"] == 0) {
					header("Location: indexMult.php");
				}else{
					header("Location: sl/snakeLadder.php");
				}  
				return true;
			}
		} 
		//return $UserRequest->rowCount();
	}
	
	public function DisplayAvailablePlayers(){
		include "../../connectToDB.php";
		$UserReq=$_db->query("SELECT * FROM users ORDER BY UserId");
		$existCount = $UserReq->rowCount();
		if ($existCount == 0) { // evaluate the count
			return "abhi";
		}
		if ($existCount > 0) {
			while($row = $UserReq->fetch(PDO::FETCH_ASSOC)){
				$name = $row["UserName"];
				$token = $row["GameId"];
				if($row["UserName"] != $_SESSION['UserName']) { // if opponent name
					if ($row["GameId"] != 0) {
						$available = "not available";
					}else{
						$available = "available";
					}
					if ($token==0){
							$token=rand(10000, 10000000);
					}
					if ($row["GameId"] != 0) {
						?>
						<span style="color:red" class="UserNameS"> <?php echo $name;?>					
						</span>
						<?php
					} else {
						?>
						<span class="UserNameS" onclick="parent.location='redirect.php?id=<?php echo $token;?>&name=<?php echo $name;?>';"> <?php echo $name;?>
						</span>
						<?php
						
					}
					?>
						</span> is 
						<span class="ChatMessageS" > <?php echo $available;?>
						</span> </br>
					<?php
					
					
				}
			}
		}
	}
    
    public function DisplayBoard(){
        include "../../connectToDB.php";
        $UserReq=$_db->query("SELECT * FROM users ORDER BY UserId");
		$existCount = $UserReq->rowCount();
		if ($existCount == 0) { // evaluate the count
			return "abhi";
		}
        if($existCount > 0){
            while($row = $UserReq->fetch(PDO::FETCH_ASSOC)){
                $board=$row["MoveString"];
                if($row["UserId"] == $_SESSION['UserId']){
                    ?>
                <!DOCTYPE html>
                <html>
                <head>
                 <link rel="stylesheet" type="text/css" href="../../../Snake&Ladder.css">
                </head>
                <body>
                  <?php echo $board;?>
                  <canvas id=canvas height = "1000" width = "1000"></canvas>
                </body>
                </html>
                <?php
                }
            }
        }
        
    }
    
       public function DisplayPlayerUpdate(){
        include "../../connectToDB.php";
        $UserReq=$_db->query("SELECT * FROM users ORDER BY UserId");
		$existCount = $UserReq->rowCount();
		if ($existCount == 0) { // evaluate the count
			return "abhi";
		}
        if($existCount > 0){
            while($row = $UserReq->fetch(PDO::FETCH_ASSOC)){
                $playerUpdate=$row["latestMove"];
                if($row["UserId"] == $_SESSION['UserId']){
                    ?>
              	<span style="color:red" class="playerUpdateS"> <?php echo $playerUpdate;?>
                </span>    
                <?php
                }
            }
        }
        
    }
    
   public function DeleteGame($id){
		include "../../connectToDB.php";
		$token=0;
		
		$ChatReq=$_db->query("SELECT * FROM chats ORDER BY ChatId");
		$existCount = $ChatReq->rowCount();
		if ($existCount == 0) { 
			return "abhi";
		}
		if ($existCount > 0) {
			while($row = $ChatReq->fetch(PDO::FETCH_ASSOC)){
				$gameChatID = $row["chatGameId"];			
				if($gameChatID == $id) {
					$GameChatIdDelete =$_db->prepare("DELETE FROM chats WHERE chatGameId=:chatGameId");
					$GameChatIdDelete->execute(array(
					'chatGameId'=>$gameChatID));	
				}
			}
		} 
		$UserReq=$_db->query("SELECT * FROM users ORDER BY UserId");
		$existCount = $UserReq->rowCount();
		if ($existCount == 0) { // evaluate the count
			return "Tom";
		}
		if ($existCount > 0) {
			while($row = $UserReq->fetch(PDO::FETCH_ASSOC)){
				$gameID = $row["GameId"];			
				if($gameID == $id) {
					$GameOpponent="";
					$GameColor="";
					$startMove="rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1";
					$UserName=$_SESSION['UserName'];
					$GameIdInsert =$_db->prepare("UPDATE users SET GameId=?, MoveString=?, GameColor=?, GameOpponent=? WHERE GameId=?");
					$GameIdInsert->execute(array($token,$startMove,$GameColor, $GameOpponent, $id));
					
					
				}
			}
		}
	}
}
?>
