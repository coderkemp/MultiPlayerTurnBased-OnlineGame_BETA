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
          background: url("greybackground.jpg") no-repeat top center fixed;
          background-size: cover;
          margin: 0;
          padding: 0;
          height: 100%;
          width: 100%;
         }  
        </style>
        <link rel="stylesheet" type="text/css" href="Snake&Ladder.css">
        <script type="text/javascript"> if (!window.console) console = {log: function() {}}; </script>
    </head>
    <body>
        <div id="top">
          R.I.T
        </div>
        <div id="welcome">
           <h1><span class="colour">Snakes & Ladders</span></h1>
           <h1>REGISTER/LOGIN</h1>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.js"   integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="   crossorigin="anonymous"></script>
  <!--   <button onclick=rollDice()>RollDice</button> -->
         <div id=board>
          </div> 
        <canvas id=canvas height = "1000" width = "1000"></canvas>
        <script type="text/javascript" src="js/Board.js"></script>
        <?php include ('php_pages/loginForm.php');?>
        <div id="SaveLoadOutput" style="display:none">	
        <input type="submit" id="multiplayer_submit" 
             onclick="parent.location='slmult/pages/UserLogin.php'" 
			value="Multiplayer game">				
		</div>
<script type="text/javascript" src="js/buttons/loginlogout.js"></script>
<script type="text/javascript" src="js/buttons/register.js"></script>
        </body>

        </html>

        <!-- <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="900px" height="600px" onload="init();">
          <rect x="0px" y="0px" width="900px" height="600px" id="background" /> 
          <g id="board"></g> 
         </svg> -->
