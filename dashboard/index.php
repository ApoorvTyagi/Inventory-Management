<?php include ('includes/connection.php'); ?>
<?php include('includes/adminheader.php');  ?>


 <div id="wrapper">       
       <?php include 'includes/adminnav.php';?>
        <div id="page-wrapper">
            <div class="container-fluid">                
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome 
                        </h1>
<div class="row">
<div class="col-lg-12">
        <div class="table-responsive">

<form action="" method="post">
            <table class="table table-bordered table-striped table-hover">


            <thead>
                    <tr>  
                        <th>Name</th>
                        <th>Stocks Remaining</th>
						<th>Delete Item</th>
                    </tr>
                </thead>
                <tbody>

                 <?php
					
$query = "SELECT * FROM stock ORDER BY stocks_left desc";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
    $item_name = $row['Item_name'];
    $item_left = $row['Stocks_left'];
   
    echo "<tr>";
    echo "<td>$item_name</td>";
    echo "<td>$item_left</td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete this item?')\" href='?del=$item_name'><i class='fa fa-times' style='color: red;'></i>Delete</a></td>";
    echo "</tr>";

}
}
?>


             </tbody>
            </table>
</form>
</div>
</div>
</div>
<?php
 
    if (isset($_GET['del'])) {
        $name_del = mysqli_real_escape_string($conn, $_GET['del']);
        $del_query = "DELETE FROM stock WHERE item_name='$name_del'";
        $run_del_query = mysqli_query($conn, $del_query) or die (mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('Item deleted successfully');
            window.location.href='index.php';</script>";
        }
        else {
         echo "<script>alert('error occured.try again!');</script>";   
        }
        }
?>

<script src="js/jquery.js"></script>  
<script src="js/bootstrap.min.js"></script>
</body>
</html>