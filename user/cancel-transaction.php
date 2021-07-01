<?php
session_start();

include '../config.php';

$username = $_SESSION['username'];
$order_id = $_GET['order_id'];

$cancelTransaction = mysqli_query(
  $connect,
  "DELETE FROM orders 
  WHERE username = '$username' AND order_id = '$order_id'
  ");

header("location: home-user.php");
?>