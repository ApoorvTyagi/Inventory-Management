<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>  
<style>
  #but1{
	width: 200px;
	background-color: #4CAF50; /* Green */
	border: none;
	color: white;
	padding: 10px 20px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  }
</style>
<body>

<?php include 'includes/header.php';?>
<?php include 'includes/navbar.php';?>

<?php

if (isset($_POST['login'])) {
  $username  = $_POST['user'];
  $password = $_POST['pass'];
	
	if ($username=="apoorv" && $password=="123456") {

	  session_start();
	  $_SESSION["name"]=$username;
      header('location: dashboard/');
  }

else {
      echo "<script>alert('invalid username/password');
      window.location.href= 'login.php';</script>";

    }
}
?>


  <div class="login-card">
    <h1><b>Login</b><br>
  <form method="POST">
	<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input type="text" name="user" placeholder="Username" required="">
	</div>
	<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input type="password" name="pass" placeholder="Password" required="">
	</div>
    <input type="submit" name="login" id="but1" value="Login">
  </form>
</div>

  <script src='css/jquery.min.js'></script>
<script src='css/jquery-ui.min.js'></script>

  
</body>
</html>
