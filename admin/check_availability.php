<?php 
session_start();
$aid=$_SESSION['id'];
require_once("includes/config.php");
if(!empty($_POST["oldpassword"])) 
{
$pass=$_POST["oldpassword"];
$result ="SELECT password FROM admin where password=$pass";
$stmt = $mysqli->query($result);
//$stmt->bind_param('s',$pass);
//$stmt->execute();
//$stmt -> bind_result($result);
//$stmt -> fetch();
$opass=$stmt;
if($opass==$pass) 
echo "<span style='color:green'> Password  matched .</span>";
else echo "<span style='color:red'> Password Not matched</span>";
}
?>
