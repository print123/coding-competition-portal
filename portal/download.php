
    
<?php
function downloadFile($file){



//$file = './uploads/check2.txt';

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: inline; filename='.basename($file));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
   header('Pragma: public');
   header('Content-Length: ' . filesize($file));


    readfile($file);
	
	

}
}

?>
<?php
	$cookie_name="username";
	$user=$_COOKIE[$cookie_name];
  session_start();
  $problem=$_GET['problem'];
  $_SESSION['problem']=$problem;
  include 'connect.php';
  $no=substr($problem,-1);
  $sql="select * from usernegative where username='$user'";
  $res=mysql_query($sql);
  //echo $sql;
  $row=mysql_fetch_row($res);
  
	
  $ver=$row[$no];
  $file='./uploads/'.$problem.'/input'.$no.'.'.$ver.'.txt';

	//echo $problem;

	downloadFile($file);
	
	
		
?>