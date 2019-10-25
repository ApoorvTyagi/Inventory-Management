<html>
<body>
<style>
  #but1{
	width: 172px;
	background-color: #4CAF50; /* Green */
	border: none;
	color: white;
	padding: 10px 20px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 12px;
  }
</style>
<?php include ('includes/connection.php'); ?>
<?php include('includes/adminheader.php');  ?>


 <div id="wrapper">       
       <?php include 'includes/adminnav.php';?>
        <div id="page-wrapper">
            <div class="container-fluid">                
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            BILLING
                        </h1>
<div class="row">
<div class="col-lg-12">
<div class="table-responsive">

<div class="container">

      <div  class="form" >
        <form id="contactform" method="POST"> 
          <p class="contact"><b>Name</b></label> </p>
          <p><input id="name" name="name" required=""type="text"> </p>
          <br>
          <p class="contact"><b>Quantity</b></label></p>
          <p><input name="stock" required="" type="text"></p> 
		  <br>
          <p class="contact"><b>Price</b></label></p>
          <p><input name="price" required="" type="text"></p>
          <br>
          <input class="buttom" name="bill" id="but1" value="ADD TO BILLING" type="submit">    
        </form> 
</div>      
</div>
</div>
</div>
</div>
<?php
 
    if (isset($_POST['bill'])) 
	{
	  $name = $_POST['name'];
      $quantity = $_POST['stock']; 
	  $price=$_POST['price'];
	  
	  $q=mysqli_query($conn,"select * from stock where Item_name='".$name."'");
	  $rows=mysqli_fetch_array($q);
	  
	  $qnts=$rows[1]-$quantity;
	  
	  if($qnts>=0)
	  {      
      $query = "insert into bill (Item_name,quantity_sold,price,total) values ('$name','$quantity','$price',$quantity*$price)";
      $result = mysqli_query($conn , $query) or die(mysqli_error($conn));
      if (mysqli_affected_rows($conn) > 0) 
	  { 
		$query1="update stock set stocks_left='".$qnts."' where Item_name='".$name."'";
		$result = mysqli_query($conn , $query1) or die(mysqli_error($conn));
		if (mysqli_affected_rows($conn) > 0) 
		{ 
		echo "<script>alert('SUCCESSFULLY ADDED & UPDATED')</script>";
        echo "<script>window.location.href='bill.php';</script>";
		}
		else
			echo "<script>alert('Error Occured');</script>";
	  }
	  else 
		echo "<script>alert('Error Occured');</script>";
	
     }	
	 else
		 echo "<script>alert('Only $rows[1] stocks left');</script>";
	}
?>

<script src="js/jquery.js"></script>  
<script src="js/bootstrap.min.js"></script>
</body>
</html>