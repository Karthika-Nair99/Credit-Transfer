<!DOCTYPE html>
<head>
 <title>Transfer Credit</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link type="text/css" rel="stylesheet" href="table.css" >

</head>
<body>
  <div class="container3">
   <div class="menubar">
	
	 <img src='icon1.png' class='logo'>
     <a href="home.php">HOME</a>
	 <a href='users.php'>USERS</a>
     <a href="transactionhistory.php">TRANSACTION HISTORY</a>	 
     </div>
	<h4>Users Details After Transaction</h4>
<?php 

$con = mysqli_connect('localhost','root','','credit');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM transaction ORDER BY id DESC LIMIT 1") or die( 
		mysqli_error($con));
$row =mysqli_fetch_array($result,MYSQLI_ASSOC);
$a=$row['fromu'];
$b=$row['tom'];
$result1 = mysqli_query($con,"SELECT * FROM users WHERE name='$b' OR name='$a' ") or die( 
		mysqli_error($con));

echo "<table id=\"my_table1\" >
<tr>
<th>Id</th>
<th>Name</th>
<th>Email</th>
<th>Amount</th>
</tr>";

while($row1 = mysqli_fetch_assoc($result1))
{

echo '<tr>';
echo '<td>' . $row1['id'].'</a></td>';
echo '<td>' . $row1['name'] .'</a></td>';
echo '<td>' . $row1['email'] . '</a></td>';
echo '<td>'. $row1['points'] . '</a></td>';
echo"</tr>";
}
echo "</table>";
mysqli_close($con);
?>

<div class='col1'>
	 <div class="photos"> 
    <img src="i6.jpg" /> 
    <img src="i7.jpg" /> 
    <img src="i10.jpg" /> 
    <img src="i9.jpg" /> 
    <img src="i8.jpg" />
	</div></div>
</div>
	
</body>
</html>