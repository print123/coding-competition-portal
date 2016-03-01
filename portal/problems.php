<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CSI</title>
	<link href="css/custom.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/custom.js"></script>
	<link rel="stylesheet" href="css/bootstrap-vertical-tabs.css">
	<script>
function newDoc() {
    window.location.assign("problemdownload.php");	
}

function display(h,m,s)
{
	
	document.getElementById("h").innerHTML = h;
	document.getElementById("m").innerHTML = m;
	document.getElementById("s").innerHTML = s;
}

function inc_timer()
{
	var time = document.getElementById("timer").value;
	if(parseInt(time)==(3600*2)) {
		alert("time out");
		document.location="finish.php";
	}
	time = parseInt(time) + 1;
	document.getElementById("timer").value = time;

	var count = 7200 - time;
	
	var seconds = count % 60;
    var minutes = Math.floor(count / 60);
    var hours = Math.floor(minutes / 60);
    minutes %= 60;
    hours %= 60;
        display(hours,minutes,seconds);

	setTimeout(function() {inc_timer()},1000);
}

</script>
</head>
<body>
<div class="container">
	<center><h1>Code.IT(101)</h1></center>
	<br/><br/><br/><br/>
	
	<?php 
		include 'connect.php';
	?>
	
	<a href="index.html" style="padding-left:80%">Logout</a>	
	<div style="position: fixed; right:5px; top:0; color: #006699;">	
		<span><h4>Time left</h4></span> 
		<span id="h"> </span><span> : </span> <span id="m"> </span> <span> : </span> <span id="s"> </span> 	
	</div>
	<h4>Score : 
		<?php
			//session_start();
       if(!isset($_COOKIE['time'])) {        
        $cookie_name="time";
        $cookie_value=time();
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
	header("Location: problems.php");        
    }    

	?>
	        <input type="hidden" name="timer" id="timer" value="<?php $t = intval(time())-intval($_COOKIE['time']); echo $t; ?>">
		<script type="text/javascript">
			inc_timer();
		</script>

	<?php 

			$cookie_name="username";
			if(isset($_COOKIE[$cookie_name])) {
				$user=$_COOKIE[$cookie_name];
			}
			else {
				header('Location:index.html');
			}
			
			$sql1="select * from userscore where username='$user'";
			$result=mysql_query($sql1);
			$row=mysql_fetch_array($result);
			echo $row['score'];
			
			
		?>
	</h4>
	
	<div class="col-xs-3"> <!-- required for floating -->
    <!-- Nav tabs -->
    <ul class="nav nav-tabs tabs-left">
      <li class="active"><a href="#home" data-toggle="tab">Problem A</a></li>
      <li><a href="#profile" data-toggle="tab">Problem B</a></li>
      <li><a href="#messages" data-toggle="tab">Problem C</a></li>
      <li><a href="#settings" data-toggle="tab">Problem D</a></li>
    </ul>
</div>

<div class="col-xs-9">
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane active" id="home">
	

&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp U've become addicted to the latest craze in collectible card games, PokeCraft: The Gathering. You've mastered the rules! You've crafted balanced, offensive, and defensive decks!<Br/> You argue the merits of various cards on Internet forums! You compete in tournaments! And now, as they just announced their huge new set of cards coming in the year 2010, you've decided you'd like to collect every last one of them! Fortunately, the one remaining sane part of your brain is wondering: how much will this cost?
<Br/>
<Br/>
<Br/>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp There are C kinds of card in the coming set. The cards are going to be sold in "booster packs", each of which contains N cards of different kinds. There are many possible combinations for a booster pack where no card is repeated.<Br/> When you pay for one pack, you will get any of the possible combinations with equal probability. You buy packs one by one, until you own all the C kinds. What is the expected (average) number of booster packs you will need to buy?
<Br/>


Input<Br/>

The first line of input gives the number of cases, T. T test cases follow, each consisting of a line containing C and N.
<Br/>
Output<Br/>
<Br/>
For each test case, output one line in the form<Br/>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp E<Br/>

where E is the expected number of booster packs you will need to buy. Any answer with a relative or absolute error at most 10-5 will be accepted.
<Br/>
Limits
<Br/>
1 =< T <= 100
<Br/>
Small dataset<Br/>
1 <= N <= C =< 10
<Br/>
Large dataset<Br/>
1 <= N <= C =< 40
<Br/>
Sample
<Br/>
Input <Br/>
2<Br/>
2 1<Br/>
3 2<Br/>
<Br/>
Output<Br/>
3.0000000<Br/>
2.5000000


<br/><br/>
<?php
$sql2="select * from usernegative where username='$user'";
$result1=mysql_query($sql2);
$row1=mysql_fetch_array($result1);
$accepted=$row['problem1'];
$negattempts=$row1['problem1'];
	if($accepted==1)
		echo "<center><label style='color:#00ff00;'>Accepted</label></center>";
	else if($negattempts>=10)
	{
		echo "<center><label style='color:#ff0000;'>Sorry you cannot try further</label></center>";
	}
	else
	{

echo "
<center>
<form action='problemdownload.php' method='post'>
<input type='submit' value='Solve' name='btnproblem1' >
<input type='hidden' name='problem' value='problem1'>
</form>
</center>";

}
	
	
	
?>
<br/>



	  
	  
	  </div>
      <div class="tab-pane" id="profile">

<br/> <br/> 
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspOnce upon a time there were several little pigs and several wolves on a two-dimensional grid of size n × m. Each cell in this grid was either empty, containing one little pig, or containing one wolf.
<br/><br/>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspA little pig and a wolf are adjacent if the cells that they are located at share a side. The little pigs are afraid of wolves, so there will be at most one wolf adjacent to each little pig. But each wolf may be adjacent to any number of little pigs.
<br/><br/>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspThey have been living peacefully for several years. But today the wolves got hungry. One by one, each wolf will choose one of the little pigs adjacent to it (if any), and eats the poor little pig. This process is not repeated. That is, each wolf will get to eat at most one little pig. Once a little pig gets eaten, it disappears and cannot be eaten by any other wolf.
<br/><br/>
What is the maximum number of little pigs that may be eaten by the wolves?<br/>
Input<br/>

The First line contains an integer t where t is no of test cases<br/>
The second line contains integers n and m (1 ≤ n, m ≤ 10) which denotes the number of rows and columns in our two-dimensional grid, respectively. Then follow n lines containing m characters each — that is the grid description. "." means that this cell is empty. "P" means that this cell contains a little pig. "W" means that this cell contains a wolf.
<br/>
It is guaranteed that there will be at most one wolf adjacent to any little pig.<br/>
Output<br/>
<br/>
Print a single number for each output of testcase — the maximal number of little pigs that may be eaten by the wolves.<br/><br/>
Sample test(s)
Input<br/>
<br/>
2<br/>
2 3<br/>
PPW<br/>
W.P<br/>
3 3<br/>
P.W<br/>
.P.<br/>
W.P<br/>
<br/>
Output<br/>
2<br/>
0<br/>

<?php

$accepted=$row['problem2'];
$negattempts=$row1['problem2'];
	if($accepted==1)
		echo "<center><label style='color:#00ff00;'>Accepted</label></center>";
	else if($negattempts>=10)
	{
		echo "<center><label style='color:#ff0000;'>Sorry you cannot try further</label></center>";
	}

	else
	{

echo "
<center>
<form action='problemdownload.php' method='post'>
<input type='submit' value='Solve' name='btnproblem2' >
<input type='hidden' name='problem' value='problem2'>
</form>
</center>";

}
	
	
	
?>
<br/>
      </div>
      <div class="tab-pane" id="messages">

<br/> <br/> <br/>
Can you imagine our life if we removed all zeros from it? For sure we will have many problems.<br/>
<br/>

In this problem we will have a simple example if we removed all zeros from our life, it's the addition operation. Let's assume you are given this equation a + b = c, where a and b are positive integers, and c is the sum of a and b. Now let's remove all zeros from this equation. Will the equation remain correct after removing all zeros?
<br/>
For example if the equation is 101 + 102 = 203, if we removed all zeros it will be 11 + 12 = 23 which is still a correct equation.
<br/>
But if the equation is 105 + 106 = 211, if we removed all zeros it will be 15 + 16 = 211 which is not a correct equation.
<br/>
Input<br/>
<br/>
The input will consist of three lines the first line contain integer t where t is number of test cases , the second line will contain the integer a, and the third line will contain the integer b which are in the equation as described above (1 ≤ a, b ≤ 109). There won't be any leading zeros in both. The value of c should be calculated as c = a + b.
<br/>Output<br/>

The output will be just one line, you should print "YES" if the equation will remain correct after removing all zeros, and print "NO" otherwise.
Sample test(s)<br/>
Input<br/>
2<br/>
101<br/>
102<br/>
105<br/>
106<br/>
<br/>
Output<br/>
<br/>
YES<br/>
NO<br/>





<?php
$accepted=$row['problem3'];
$negattempts=$row1['problem3'];

	if($accepted==1)
		echo "<center><label style='color:#00ff00;'>Accepted</label></center>";
	else if($negattempts>=10)
	{
		echo "<center><label style='color:#ff0000;'>Sorry you cannot try further</label></center>";
	}
	else
	{

echo "
<center>
<form action='problemdownload.php' method='post'>
<input type='submit' value='Solve' name='btnproblem3' >
<input type='hidden' name='problem' value='problem3'>
</form>
</center>";

}
	
	
	
?>
<br/>
      </div>
      <div class="tab-pane" id="settings">

<br/> 
<br/> 
Petya loves lucky numbers very much. Everybody knows that lucky numbers are positive integers whose decimal record contains only the lucky digits 4 and 7. For example, numbers 47, 744, 4 are lucky and 5, 17, 467 are not.
<br/><br/> 
Petya loves tickets very much. As we know, each ticket has a number that is a positive integer. Its length equals n (n is always even). Petya calls a ticket lucky if the ticket's number is a lucky number and the sum of digits in the first half (the sum of the first n / 2 digits) equals the sum of digits in the second half (the sum of the last n / 2 digits). Check if the given ticket is lucky.
<br/> <br/> Input<br/> 

The First line contains number of test cases T.
The second line contains an even integer n (2 ≤ n ≤ 50) — the length of the ticket number that needs to be checked. The Third line contains an integer whose length equals exactly n — the ticket number. The number may contain leading zeros.
<br/> Output<br/> 

On the first line print "YES" if the given ticket number is lucky. Otherwise, print "NO" (without the quotes).
<br/> Sample test(s)
Input<br/> 
3<br/> 
2<br/> 
27<br/> 
4<br/> 
4738<br/> 
4<br/> 
4774<br/> <br/> 
Output<br/> 
NO<br/> 
NO<br/> 
YES<br/> 
<?php
$accepted=$row['problem4'];
$negattempts=$row1['problem4'];

	if($accepted==1)
		echo "<center><label style='color:#00ff00;'>Accepted</label></center>";
	else if($negattempts>=10)
	{
		echo "<center><label style='color:#ff0000;'>Sorry you cannot try further</label></center>";
	}
	else
	{

echo "
<center>
<form action='problemdownload.php' method='post'>
<input type='submit' value='Solve' name='btnproblem4' >
<input type='hidden' name='problem' value='problem4'>
</form>
</center>";

}
	
	
	
?>
<br/>
      </div>
    </div>
</div>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

		
</body>

</html>
