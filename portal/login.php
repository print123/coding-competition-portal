<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CSI DDU-Student branch</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/additional.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
		<div class="row">
		  <div class="col-md-9">
		    <a href="#" class="thumbnail">
		      <img src="images/dditlogo.jpg" alt="image error">
		    </a>
		  </div>
		
		  
            </div>
		
        </div>
 </nav>

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<div class="containerbody">
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <div class="form-login">
		<div class="row">
			<div class="col-md-6">
				<a href="" class="thumbnail">
				      <img src="images/csi.jpg" alt="image error">
				    </a>
			</div>
			<div class="col-md-6">
			    	<h4>Login</h4>
				
			    <form id="form" name="form" method="post" action="">
				    <input type="text" id="username" name="username" class="form-control input-sm chat-input" placeholder="username" />
				    </br>
				    <input type="password" name="password" id="password" class="form-control input-sm chat-input" placeholder="password" />
				    </br>
				    <div class="wrapper">
				    <span class="group-btn">     
					<input class="btn btn-primary btn-md" type="submit" value="Login">
				    </span>
				    </div>
			    </form>
            		</div>
               </div>
        
        </div>
    </div>
</div>
</div>


<?php
if(isset($_POST['username'])) {
  
  include("connect.php");
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  $login_query = mysqli_prepare($DB, "SELECT username FROM quiz WHERE username=? AND password=?");
  
  mysqli_stmt_bind_param($login_query,'ss',$username,$password);
  mysqli_stmt_execute($login_query);
  mysqli_stmt_bind_result($login_query, $usr);
  
  if(mysqli_stmt_fetch($login_query)) {
    setcookie("user", $usr, time() + (3600) , "/");
    header("Location: start.php");
  }
}


?>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
</body>

</html>
