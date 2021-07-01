<?php
include '../config.php';

$username = $_GET['username'];

$deleteFromLogin = mysqli_query(
  $connect,
  "DELETE FROM login WHERE username = '$username'"
);

$deleteFromOrders = mysqli_query(
  $connect,
  "DELETE FROM orders WHERE username = '$username'"
);

$deleteFromUser = mysqli_query(
  $connect,
  "DELETE FROM users WHERE username = '$username'"
);

header("location: admin-users.php");
?>