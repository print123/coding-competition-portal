<?php
$host="localhost"; //yout host name
$username="tushar";  //yout user name
$password="12345678";      // your password
$db_name="tushar";  // your database name
$con=mysql_connect("$host", "$username", "$password")or die("cannot connect"); //mysql connection
mysql_select_db("$db_name") or die("cannot select DB");
?>
