<!DOCTYPE html>
<?php 

$con = mysqli_connect('localhost','root','','credit');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id = $_GET['id'];
$result = mysqli_query($con,"SELECT * FROM users where id = '$id' ") or die( 
		mysqli_error($con));
$row =mysqli_fetch_array($result,MYSQLI_ASSOC);
$p=$row['points'];

if(isset($_POST['book1']))
{
	$from1=$_POST['name1'];
	$to1=$_POST['tom'];
	$point=$_POST['point'];
	$v=$p-$point;
	
	if($p<$point){echo "<script type='text/javascript'>alert('You dont have enough balance!!!')</script>";
	}
	if($p>=$point){
$query = "INSERT INTO transaction(fromu,tom,amount) values('$from1','$to1','$point')";
$result2 = mysqli_query($con,$query);

$query1="UPDATE users SET points=$v where id='$id'";
$result3=mysqli_query($con,$query1);
$result5=mysqli_query($con,"SELECT * FROM users where name='$to1'") or die( 
		mysqli_error($con));
$row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);
$z=$row5['points'];		
$y=$z+$point;
$result4=mysqli_query($con,"UPDATE users SET points=$y where name='$to1'") or die( 
		mysqli_error($con));
	
if ($result2)
{
	echo "<script type='text/javascript'>
	window.location.href='/internship/userdetails.php';
	alert('Transaction successful!!!');
</script>";

	}
else
{
	echo "<script type='text/javascript'>alert('Connection Failed!!')</script>";
}
	

}
}
else{
	echo"";
}

?>
<head>
 <title>Transfer Credit</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link type="text/css" rel="stylesheet" href="transfer.css" >

</head>
<body>
  <div class="container">
   <div class="menubar">
	
	 <img src='icon1.png' class='logo'>
     <a href="home.php">HOME</a>
	 <a href='users.php'>USERS</a>
     <a href="transactionhistory.php">TRANSACTION HISTORY</a>	 
     </div>


<div class='container1'>

<div class="login-wrap">
	<div class="login-form">

<form  method="post">
        
		<div class="form1">
		<h1>Transfer Credits</h1>
		<img  src="i4.jpg">
		<hr>
		<div class ='head1'>
		<h2>From</h2>
		<label for="name">Name</label>
 		 <input type="text" id="name" name="name1" value="<?php echo $row['name']; ?>"/> <br><br>
		 
		 
		 <h2>To</h2>
		 <label for="name">Name</label>
		 <select id="select" name="tom" required>
		<option label=""></option>
		<?php 
		$result1 = mysqli_query($con,"SELECT * FROM users where id != '$id' ") or die( 
		mysqli_error($con));
		while($row1 = mysqli_fetch_assoc($result1))
{
		echo'<option >'.$row1[name].'</option>';
}?></select>
		 
		
 	
<br><br>
		<label for="contact">Points</label>
 		 <input type="text" id="point" name="point" value="" autocomplete="off"/>
		 
		<br><br><br>
		
		&nbsp &nbsp &nbsp &nbsp  <input id='button'type="submit" name="book1" value="submit"/>
</div>		<br><br><br>
</div>
</form>
</div>
</div>
</div>
<div class='blah'>&nbsp &nbsp &nbsp &nbsp </div>
</div>
</body>
</html>
