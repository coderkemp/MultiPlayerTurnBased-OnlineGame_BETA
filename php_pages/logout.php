<?php
  include_once("../connectToDB.php");
  $_db=null;
  session_destroy();
  $output=array("msg"=>"you are logged out","loggedin"=>"false");
  echo json_encode($output);
?>
