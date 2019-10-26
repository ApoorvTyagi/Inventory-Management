<html>
<head>
<style>
body {
  background-color: #f6d8ac;
}
#detail {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#detail td {
  border: 1px solid #ddd;
  padding: 5px;
  text-align: center;
  width:20%;
}

#detail tr:nth-child(even){background-color: #f2f2f2;}

#detail tr:hover {background-color: #ddd;}

#detail th {
  padding-top: 12px;
  padding-bottom: 12px;
  border: 1px solid #ddd;
  width:20%;
  text-align: center;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>

<h1><center>TOTAL SALE</h1>
<?php
session_start();
if (!isset($_SESSION['name'])) {
    echo "<script>alert('You need to login first');
    window.location.href='../login.php';</script>";	
}

	$con=mysqli_connect("localhost","root","","fashion");
	if($con){
		$q=mysqli_query($con,"select * from bill WHERE YEAR(Time) = YEAR(CURRENT_DATE - INTERVAL 0 MONTH)
AND MONTH(Time) = MONTH(CURRENT_DATE - INTERVAL 0 MONTH)order by time desc");
		?>
		<table id="detail">
			<tr>
				<th>Item Name</th>
				<th>Quantity Sold</th>
				<th>Selling Price</th>
				<th>Time</th>
			</tr>
		</table>	
		<?php	
		$total=0;
		while($rows=mysqli_fetch_array($q))
		{
			$total=$total+($rows[1]*$rows[2]);
			?>
			
			<table id="detail">
			<tr>
			<td><?php echo $rows[0]; ?></td>
			<td><?php echo $rows[1]; ?></td>
			<td><?php echo $rows[2]; ?></td>
			<td><?php echo $rows[4]; ?></td>
			</tr>
			</table>
			
			<?php		
		}
		?>
		<br>
		<?php
		echo "TOTAL SALE : ";
		echo "$total";
	}
	else
		echo "There was a error in connection";
?>
