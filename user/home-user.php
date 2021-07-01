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
    <a class="navbar-brand" href="home-user.php">
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
        <li class="breadcrumb-item active" aria-current="page">Your e-Tickets</li>
        <li class="breadcrumb-item"><a href="profile.php">Profile</a></li>
      </ol>
    </nav>

    <a href="buy-ticket.php" class="btn btn-success">Buy e-Ticket</a>
    <br>
    <br>

    <h3>Your e-Tickets</h3>
    <br>

    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th></th>
            <th>Order Date</th>
            <th>Departure</th>
            <th>Destination</th>
            <th>Flight Time</th>
            <th>Qty.</th>
            <th>Total Price</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            include '../config.php';

            $num = 1;

            $username = $_SESSION['username'];

            $getTableOrders = mysqli_query(
              $connect,
              "SELECT *
              FROM orders 
              WHERE username = '$username'"
            );

            if ($getTableOrders->num_rows > 0) {
              while ($getDataTableOrders = mysqli_fetch_array($getTableOrders)) {
            ?>
                <td><?php echo $num++ ?></td>
                <td><?php echo $getDataTableOrders['order_date'] ?></td>
                <td><?php echo $getDataTableOrders['departure'] ?></td>
                <td><?php echo $getDataTableOrders['destination'] ?></td>
                <td><?php echo $getDataTableOrders['flight_time'] ?></td>
                <td><?php echo $getDataTableOrders['qty'] ?></td>
                <td>Rp. <?php echo $getDataTableOrders['total_price'] ?></td>
                <?php
                echo "<td><a href='cancel-transaction.php?order_id=$getDataTableOrders[order_id]' class='btn btn-danger'>Cancel transaction</a></td>";
                ?>
          </tr>
        <?php
              }
            } else {
        ?>
        </tr>
        </tbody>
      </table>
      <div class="text-center">
        No data available.
      </div>
    <?php
            }
    ?>
    </tr>
    </tbody>

    </table>
    </div>
  </div>
</body>

</html>