<?php

session_start();
if (!isset($_SESSION['name'])) {
    echo "<script>alert('You need to login first');
    window.location.href='../login.php';</script>";	
}
echo "<script>alert('PAGE UNDER CONSTRUCTION')</script>";
echo "<script>history.go(-1)</script>";
?>