<?php
$user=$_POST["username"];
$pass=$_POST["pass"];
include 'connect.php';
$sql1="select * from login where username='$user' and password='$pass'";
$result1=mysql_query($sql1);
$row=mysql_fetch_array($result1);
//echo $row;
if(!$row)
{
	echo "<script> var ask=window.confirm('Wrong credentials');
				if(ask){
					document.location.href='index.html';
				}
				else{
					document.location.href='index.html';
				}</script>";

		
}
else{
/*	session_start();
	
	$_SESSION['username']=$user;*/
	$cookie_name="username";
	$cookie_value=$user;
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
	header('Location:problems.php');
}
?>