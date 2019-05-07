<?php
session_start();
include_once("../connectToDB.php");
if(isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
   // $password = $_POST['password'];
    $sql = $_db->query("SELECT * FROM users WHERE UserName='$username' AND UserPassword='$password' LIMIT 1");
    
    $existCount = $sql->rowCount(); //count the number of rows
    if($existCount == 0){
        $_SESSION['username'] = false;
        $output = array('msg'=>'Hello $uname','loggedin'=>false);
    }
    
    if($existCount > 0){
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
            $id = $row["UserId"];
            $uname = $row["UserName"];
            $pword = $row["UserPassword"];
        }
    $_SESSION['username'] = $uname; //session stores the value when you move around multiple pages & come back it will have the present value
    $_SESSION['password'] = $pword;
        $output = array("msg"=>"Hello $uname!! Click on the Multiplayer button to enter the CHAT-ROOM" , "loggedin"=>"true");
    }
    echo json_encode($output);
}
?>


