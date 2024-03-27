<?php
session_start();
$name="root";
$pwd='';
$db="varshith";
$conn=new mysqli("localhost",$name,$pwd,$db);
if(!$conn) {
  die("unable to connect");
}
else{
  $_SESSION['db'] = $conn;
  // $_SESSION['log'] = "false";

}
?>
