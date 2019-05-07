 <?php
session_start();
include_once("../connectToDB.php");
if(isset($_POST['regusername'])) {
    $username = $_POST['regusername'];
   // $password = $_POST['regpassword'];
    $password = sha1($_POST['regpassword']);
    $sql = "INSERT INTO users (UserName,UserPassword) VALUES (:UserName, :UserPassword)";
    $q = $_db->prepare($sql);
    $q->execute(array(':UserName'=>$username,':UserPassword'=>$password));
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password; //fix-added
    $output = array("msg"=>"Hello $username! You are registered! Please login to the account","loggedin"=>"true");
    echo json_encode($output);
}
?>
