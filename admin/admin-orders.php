<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Raleway&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Oswald', sans-serif;
      font-family: 'Raleway', sans-serif;
    }
  </style>
  <title>Home</title>
</head>

<body>
  <nav class="navbar navbar-light bg-primary">
    <a class="navbar-brand" href="admin-airports.php">
      <div class="container" style="color: white;">
        <h2><b>LOGO</b></h2>
      </div>
    </a>

    <span class="navbar-text">
      <a href="../logout.php" style="color: white;" class="btn">Logout</a>
    </span>
  </nav>

  <div class="container">
    <?php
    session_start();

    if (!isset($_SESSION['username'])) {
      header("location: ../index.php");
    }
    ?>

    <br>
    <div class="alert alert-primary" role="alert">
      <h5>Hello, <?php echo $_SESSION['username']; ?>!</h5>
    </div>

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="admin-airports.php">Airports</a></li>
        <li class="breadcrumb-item"><a href="admin-users.php">Users</a></li>
        <li class="breadcrumb-item active" aria-current="page">Orders</li>
      </ol>
    </nav>

    <br>
    <h4>List of Orders</h4>
    <br>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th></th>
            <th>Order Date</th>
            <th>Ordered By</th>
            <th>Departure</th>
            <th>Destination</th>
            <th>Qty.</th>
            <th>Total Price</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            include '../config.php';

            $num = 1;

            $getTableOrders = mysqli_query(
              $connect,
              "SELECT * FROM orders
              ORDER BY order_id"
            );

            while ($getDataTableOrders = mysqli_fetch_array($getTableOrders)) {
            ?>
              <td><?php echo $num++ ?></td>
              <td><?php echo $getDataTableOrders['order_date']; ?></td>
              <td><?php echo $getDataTableOrders['username']; ?></td>
              <td><?php echo $getDataTableOrders['departure']; ?></td>
              <td><?php echo $getDataTableOrders['destination']; ?></td>
              <td><?php echo $getDataTableOrders['qty']; ?></td>
              <td>Rp. <?php echo $getDataTableOrders['total_price']; ?></td>
          </tr>
        <?php
            }
        ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>