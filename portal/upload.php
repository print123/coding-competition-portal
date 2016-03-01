
<?php
	if(!file_exists($_FILES['fileToUpload']['tmp_name']) || !is_uploaded_file($_FILES['fileToUpload']['tmp_name']))
	{
		header('location:problemdownload.php');
	}
	$cookie_name="username";
			if(isset($_COOKIE[$cookie_name])) {
				$user=$_COOKIE[$cookie_name];
			}
			else {
				header('Location:index.html');
			}
	$fileContent = file_get_contents($_FILES['fileToUpload']['tmp_name']);
	session_start();
	$problem=$_SESSION['problem'];
   //$user=$_SESSION['username'];
   
   include 'connect.php';
  $no=substr($problem,-1);
  $sql="select ".$problem." from usernegative where username='$user'";
  $res=mysql_query($sql);
  $row=mysql_fetch_row($res);

  $ver=$row[0];
	$ver=($ver/2);
  $filename='./uploads/'.$problem.'/abcpqr/qrs'.$no.'.'.$ver.'.txt';
 
    $file = file_get_contents($filename);
	

	$fileContent=preg_replace('/\s+/', '', $fileContent);
	//echo "<br/>";
	//echo $file;
	//$file="5 4 3 2 1 ";
	$file=preg_replace('/\s+/', '', $file);
	if($fileContent==$file)
	{
		$sql2="select score from userscore where username='$user'";
		$res1=mysql_query($sql2);
		$row=mysql_fetch_array($res1);
		$cs=$row[0];
		$cs+=100;
		
		echo "Your ans is correct";
		$sql1="update userscore set ".$problem."=1,score='$cs' where username='$user'";
		mysql_query($sql1);
		
	}
	else
	{
		echo "Your ans is incorrect";
		$sql2="select * from usernegative where username='$user'";
		$result=mysql_query($sql2);
		$row=mysql_fetch_row($result);
		$curr=$row[$no];
		$curr++;
		$curr++;	
		$sql3="update usernegative set ".$problem."=".$curr." where username='$user'";

		$result1=mysql_query($sql3);
		$cookie_name = "time".substr($_SESSION['problem'],-1);
		setcookie($cookie_name,"",time()-100,"/");
		//echo $result1;
		//$sql4="update userscore set ".$problem."=0,score=score-10 where username='$user'";
		//mysql_query($sql4);

	}
	echo "<br/>";
	echo "<a href='problems.php'>Problems</a>";
?>

