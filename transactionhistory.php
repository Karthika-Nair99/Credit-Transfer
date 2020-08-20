<!DOCTYPE html>
<head>
 <title>Transfer Credit</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link type="text/css" rel="stylesheet" href="table.css" >
</head>
<body>
<div id="container2">
   
    <div class="menubar">
	
	 <img src='icon1.png' class='logo'>
     <a href="home.php">HOME</a>
	 <a href='users.php'>USERS</a>
     <a href="transactionhistory.php">TRANSACTION HISTORY</a>	 
     </div>
	<h4>Transaction History</h4>
<?php 

$con = mysqli_connect('localhost','root','','credit');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM transaction ") or die( 
		mysqli_error($con));

echo "<table id=\"my_table\" >
<tr>
<th>Id</th>
<th>Name</th>
<th>Email</th>
<th>Amount</th>
</tr>";
while($row = mysqli_fetch_assoc($result))
{

echo '<tr>';
echo '<td>'. $row['id'].'</td>';
echo '<td>' . $row['fromu'] .'</td>';
echo '<td>' . $row['tom'] . '</td>';
echo '<td>'. $row['amount'] . '</td>';
echo"</tr>";
}
echo "</table>";
mysqli_close($con);
?><script>setInterval(function(){
$("#container2").css('height',$(document).height());
},50);</script>


<div class='col1'>
	 <div class="photos"> 
    <img src="i1.jpg" /> 
    <img src="i7.jpg" /> 
    <img src="i10.jpg" /> 
    <img src="i2.jpg" /> 
    <img src="i4.jpg" />
	</div>

</div>

</div>
</body>
</html>
