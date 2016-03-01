<?php
	include('connect.php');
	$sql1="select * from login";
	$res=mysql_query($sql1);
	$row=mysql_fetch_array($res);
	//print_r;
	while($row=mysql_fetch_array($res))
	{
		$usr=$row['username'];
		$sql2="insert into userscore(username) values('$usr')";
		$res1=mysql_query($sql2);
		echo $usr;
		echo "<br/>";
	}

?>
