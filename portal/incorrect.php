<html>
<head>

</head>

<body>
	Your answer is incorrect
	<a href="problems.php">Go to Problems</a>
</body>
</html>
<?php
	session_start();
	$problem=$_SESSION['problem'];
	include('connect.php');
	$user=$_COOKIE['username'];
	$sql1 = "UPDATE usernegative SET {$problem}={$problem}+2 where username='$user' ";
	mysql_query($sql1);
	$no=substr($problem,-1);
	$cookie_name = "time".$no;
	//echo $cookie_name;
	setcookie($cookie_name, "", time() - 100,"/");
?>
