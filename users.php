<!DOCTYPE html>
<head>
 <title>Transfer Credit</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link type="text/css" rel="stylesheet" href="table.css" >
<style>html{
	overflow:hidden;
}</style>
</head>
<body>
<div class="container">
   
    <div class="menubar">
	
	 <img src='icon1.png' class='logo'>
     <a href="home.php">HOME</a>
	 <a href='users.php'>USERS</a>
     <a href="transactionhistory.php">TRANSACTION HISTORY</a>	 
     </div>
		<h4>Users</h4>
	
<?php 

$con = mysqli_connect('localhost','root','','credit');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM users ") or die( 
		mysqli_error($con));

echo "<table id=\"my_table\">
<tr>
<th>Id</th>
<th>Name</th>
<th>Email</th>
<th>Amount</th>
</tr>";

while($row = mysqli_fetch_assoc($result))
{

echo '<tr>';
echo '<td><a href=transfer.php?id='.$row['id'].' >' . $row['id'].'</a></td>';
echo '<td><a href=transfer.php?id='.$row['id'].'>' . $row['name'] .'</a></td>';
echo '<td><a href=transfer.php?id='.$row['id'].'>' . $row['email'] . '</a></td>';
echo '<td><a href=transfer.php?id='.$row['id'].'>'. $row['points'] . '</a></td>';
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
	</div>
<div class='blah'>&nbsp &nbsp &nbsp &nbsp </div>
</div>
</body>
</html>