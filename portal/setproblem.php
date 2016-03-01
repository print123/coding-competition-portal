<?php
	$problem=$_POST['problem'];
	session_start();
	$_SESSION['problem']=$problem;
	echo "<script> var ask=window.confirm('Are you sure?');
				if(ask){
					window.location.assign('problemdownload.php');
				}
				else{
					location.href='problems.php';
				}</script>";
	 
	//header('Location:problemdownload.php');

?>