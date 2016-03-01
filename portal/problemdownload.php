<?php
	session_start();
        $cookie_name="username";
        $user=$_COOKIE[$cookie_name];
	if(isset($_POST['problem']))
        $problem=$_POST['problem'];
	else
	$problem=$_SESSION['problem'];
        //session_start();
         $_SESSION['problem']=$problem;
         include 'connect.php';
  	$no=substr($_SESSION['problem'],-1);
 	 $sql="select * from usernegative where username='$user'";
  	$res=mysql_query($sql);
  //echo $sql;
  	$row=mysql_fetch_row($res);


  	$ver=$row[$no];
	$ver=($ver/2);
  	$file='./uploads/'.$problem.'/input'.$no.'.'.$ver.'.txt';
  	$name='input'.$no.'.'.$ver.'.txt'

        //if(isset($_POST["fname"])) {

        //}
?>
<?php

                //session_start();
          $cookie_name="time".$no;

       	if(!isset($_COOKIE[$cookie_name])) {
        //$cookie_name="time".$no;
        $cookie_value=time();
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        //echo $cookie_value;
        header("Location: problemdownload.php");
        //echo $cookie_value;
    }

  ?>
<html>
<head>
<script>

function display1(hours,minutes,seconds)
{
        
        document.getElementById("h").innerHTML = hours;
        document.getElementById("m").innerHTML = minutes;
        document.getElementById("s").innerHTML = seconds;
}


function inc_timer1()
{
	var count_o = document.getElementById("timer").value;
	if(count_o == 240) {
		document.location = "incorrect.php";
		clearTimeout(tt);
	}	
	
	count_o = parseInt(count_o) + 1;

	document.getElementById("timer").value = count_o;

	count = 240 - parseInt(count_o);
    var seconds = count % 60;
    var minutes = Math.floor(count / 60);
    var hours = Math.floor(minutes / 60);
    minutes %= 60;
    hours %= 60;
	display1(hours,minutes,seconds);

	var tt = setTimeout(function() {inc_timer1();} , 1000);
    //document.getElementById("timer").innerHTML = hours + "hours " + minutes + "minutes and" + seconds + " seconds left on this Sale!"
}


</script>
</head>
<body>

<div style="position: fixed; right:5px; top:0; color: #006699;">
                <span><h4>Time left</h4></span>
                <span id="s">10</span> <span> secs </span>
		<span id="m"></span><span> mins </span>
		<span id="h"></span><span> hours</span>
        </div>

<form action="" method="post">
	<a href=<?php echo $file?> download=<?php echo $name ?>>Download Input File</a>
	<!--<input type="hidden" name="fname" value="<?php echo $name;?>">
	<input type="hidden" name="file" value="<?php echo $file;?>">
	<input type="submit" value="Download file">-->
</form>
 
		
                <input type="hidden" name="timer" id="timer" value="<?php $t = intval(time())-intval($_COOKIE['time'.$no]); echo $t; ?>">
     
		<script type="text/javascript">
                        inc_timer1();
                </script>
		<!--<div id="worked">4:00</div>-->
<br/>
<form action='upload.php' method='post' enctype='multipart/form-data' >
     Upload solution <br/>
    <input type='file' name='fileToUpload' id='fileToUpload'>
	<br/><br/>
    <input type='submit' value='Upload File' name='submit' >
</form>
</body>
</html>
