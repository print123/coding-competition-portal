<html>
<head>
<!--<script>
window.onload=function(){
    window.location.assign("download.php");
	
}

</script>-->
</head>
<body>
<form action="" method="post" enctype="multipart/form-data" >
     Upload solution <br/>
    <input type="file" name="fileToUpload" id="fileToUpload">
	<br/><br/>
    <input type="submit" value="Upload File" name="submit">
</form>
</body>
</html>

<?php
	
	if(is_uploaded_file($_FILES['fileToUpload']['tmp_name'])){
	$fileContent = file_get_contents($_FILES['fileToUpload']['tmp_name']);
    $file = file_get_contents('./uploads/check2.txt');
	
	$fileContent=preg_replace('/\s+/', '', $fileContent);
	include 'connect.php';
	//echo "<br/>";
	//echo $file;
	//$file="5 4 3 2 1 ";
	$file=preg_replace('/\s+/', '', $file);
	if($fileContent==$file)
	{
		echo "Your ans is correct";
		$sql1="update userscore set problem1=1,score=score+100 where username='$user'";
		mysql_query($sql1);
	}
	else
	{
		echo "Your ans is incorrect";
		$sql2="select * from usernegative where username='$user'";
		$result=mysql_query($sql2);
		$row=$mysql_fetch_array($result);
		$curr=$row['problem1'];
		$curr++;
		$sql3="update usernegative set problem1='$curr' where username='$username'";
		$result1=mysql_query($sql3);
	}
}
else
{
	include 'download.php';
}

?>