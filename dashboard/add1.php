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
                            ADD ITEMS
                        </h1>
<div class="row">
<div class="col-lg-12">
<div class="table-responsive">

<div class="container">

      <div  class="form" >

        <form id="contactform" method="POST"> 
          <p class="contact"><label for="name">Name:</label></p>
          <p><input id="name" name="name" required=""type="text"> </p>
           <br>
          <p class="contact"><label for="email">Quantity:</label></p>
          <p><input name="stock" required="" type="text"></p> 
           <br>
          <input class="buttom" name="add" id="but1" value="ADD" type="submit">    
        </form> 
</div>      
</div>
</div>
</div>
</div>
<?php
 
    if (isset($_POST['add'])) 
	{
	  $name = $_POST['name'];
      $stock =$_POST['stock']; 
	  
	  $checkusername = "SELECT * FROM stock WHERE Item_name = '$name'";
      $run_check = mysqli_query($conn , $checkusername) or die(mysqli_error($conn));
      $countusername = mysqli_num_rows($run_check); 
      if ($countusername==0)
	  {
		  $query = "insert into stock (Item_name,Stocks_left) values ('$name','$stock')";
		  $result = mysqli_query($conn , $query) or die(mysqli_error($conn));
		  if (mysqli_affected_rows($conn) > 0) 
		  {
			echo "<script>alert('SUCCESSFULLY ADDED')</script>";
			echo "<script>window.location.href='add1.php';</script>";
		  }
		  else 
			echo "<script>alert('Error occured while adding new Item');</script>";
	
    }	
	else
	{
		  $query = "update stock set stocks_left=stocks_left+'$stock' where Item_name='$name'";
		  $result = mysqli_query($conn , $query) or die(mysqli_error($conn));
		  if (mysqli_affected_rows($conn) > 0) 
		  {
			  echo "<script>alert('SUCCESSFULLY UPDATED');
			  window.location.href='add1.php';</script>";
		  }
		  else 
			echo "<script>alert('Error Occured while updating item');</script>";
	}
	
	}
?>

<script src="js/jquery.js"></script>  
<script src="js/bootstrap.min.js"></script>
</body>
</html>