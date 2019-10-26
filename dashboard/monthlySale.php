<?php
session_start();
if (!isset($_SESSION['name'])) {
    echo "<script>alert('You need to login first');
    window.location.href='../login.php';</script>";	
}
	$con=mysqli_connect("localhost","root","","fashion");
	if($con)
	{
		$q=mysqli_query($con,"select * from bill WHERE YEAR(Time) = YEAR(CURRENT_DATE - INTERVAL 0 MONTH)
						AND MONTH(Time) = MONTH(CURRENT_DATE - INTERVAL 0 MONTH)order by time desc");
	$total=0;
	$month=date('F');
	while($rows=mysqli_fetch_array($q))
	{
		$total=$total+($rows[1]*$rows[2]);
	}
	}
	echo "<script>alert('Your Total Sale for $month is $total')</script>";
	echo "<script>history.go(-1)</script>";
?>