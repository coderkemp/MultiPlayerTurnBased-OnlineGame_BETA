<!-- The one inside sl folder -->
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Snakes & Ladders</title>  
         <style>
        body{
          background: url("../../../greybackground.jpg") no-repeat top center fixed;
          background-size: cover;
          margin: 0;
          padding: 0;
          height: 100%;
          width: 100%;
         }  
        </style>
        <link rel="stylesheet" type="text/css" href="../../../Snake&Ladder.css">
        <script type="text/javascript"> if (!window.console) console = {log: function() {}}; </script>
    </head>
    <body>
        <div id="top">
          R.I.T
        </div>
        <script   src="https://code.jquery.com/jquery-3.3.1.js"   integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="   crossorigin="anonymous"></script>
         <input type="submit" onclick="parent.location='../indexMult.php'" id="deleteGame-submit" value="New Opponent">
		<h2>Welcome <span style="color:green"><?php echo $_SESSION['UserName'];?>! </span>You are playing against <span style="color:red"><?php echo $_SESSION['Opponent'];?>! </span>
		</h2>	
        <input type="hidden" id="UserName" name="UserName" value="<?php echo $_SESSION['UserName'];?>"/>
        <input type="hidden" id="Opponent" name="Opponent" value="<?php echo $_SESSION['Opponent'];?>"/>
        <input type="hidden" id="GameId" name="GameId" value="<?php echo $_SESSION['GameId'];?>"/>
        <div id="rules">
         <h3>GAME INSTRUCTIONS</h3>
         <h4>Click on the Throw Dice! button. The Dice below the boards will get updated. Left Board is a static board which shows what colour is a ladder or a snake. Right Board is the one which will be getting updated when you are playing with another player.</h4> 
        </div>
        <div id="gameid">
        <h2>GAME ID:  <span style="color:red"><?php echo $_SESSION['GameId'];?> </span></h2>
        </div>
         <div id=board>
          </div> 
        <canvas id=canvas height = "1000" width = "1000"></canvas>
        <script>
        var face1=new Image();
        face1.src="d1.gif";
        var face2=new Image();
        face2.src="d2.gif";
        var face3=new Image();
        face3.src="d3.gif";
        var face4=new Image();
        face4.src="d4.gif";
        var face5=new Image();
        face5.src="d5.gif";
        var face6=new Image();
        face6.src="d6.gif";
       </script>
        
<!--        <script type="text/javascript" src="../sl/js/testBoard.js"></script> -->
        <script src="js/Multiplayer.js"></script>
        <div id="ChatMessages">
		</div>
        
	    <div id="ChatBig">
		<span style="color:green">Chat</span><br/>
		<textarea id="ChatText" name="ChatText"></textarea>
	    </div>
        
        <img src="d1.gif" name="mydice" id="dicePos">
        <input type="button"  value="Throw dice!" onClick="rollDice()">
         <input type="button"  value="Click here for Player roll update" onClick="playerUpdate()">
<!--    <div class="rolledValue"></div> -->
        <div id="playerUpdate"></div>
        <div class="ladder"></div>
        <div class="won"></div>
        
<!--        <button onclick=rollDice()>RollDice</button>  -->
        <div id="multiView"><h4>Multiplayer Board View</h4></div>
        <div id="green"><h4>Green line indicates: LADDERS</h4></div>
        <div id="red"><h4>Red line indicates: SNAKES</h4></div>
        <div id="testBoard">
        </div>
        <canvas id=testcanvas height = "1000" width = "1000"></canvas>
    <!--    <div id="SaveLoadOutput" style="display:none">		
			<div id="lMove"></div>
			<input type="submit" id="lMoveSQL_submit" value="Start saved game">	
			<div id="lMoveSQL_data" ></div> 
			<br/>
			<input type="submit" id="lSaveSQL_submit" value="Save board">	
			<div id="lSaveSQL_data" ></div>
			<br/>
			<input type="submit" id="multiplayer_submit" 
			onclick="parent.location='slmult/pages/UserLogin.php'" 
			value="Multiplayer game">				
		</div>  -->

         <script src="../../js/chatboxInGame.js"></script>
        </body>

        </html>
