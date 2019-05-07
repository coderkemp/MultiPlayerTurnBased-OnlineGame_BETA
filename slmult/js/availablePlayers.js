$(document).ready(function() {
    setInterval(function(){
        $("#AvailablePlayers").load("DisplayPlayers.php");
    },1500);
    
   $("#AvailablePlayers").load("DisplayPlayers.php"); 
});