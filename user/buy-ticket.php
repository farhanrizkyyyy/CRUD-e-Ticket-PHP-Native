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

    <div class="jumbotron">
      <h2>Buy e-Ticket</h2>
      <hr>
      <form action="" method="post">
        <div class="form-group">
          <?php
          include '../config.php';

          $getTableAirports = mysqli_query(
            $connect,
            "SELECT airports_code, airports_name FROM airports"
          );
          ?>
          <label for="departure">Departure</label>
          <select class="form-control" name="departure" id="departure">
            <?php
            while ($getAirportsCode = mysqli_fetch_array($getTableAirports)) {
              echo "<option value='$getAirportsCode[airports_code]'>$getAirportsCode[airports_name]</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <?php
          include '../config.php';

          $getTableAirports = mysqli_query(
            $connect,
            "SELECT airports_code, airports_name FROM airports"
          );
          ?>
          <label for="destionation">Destination</label>
          <select class="form-control" name="destination" id="destination">
            <?php
            while ($getAirportsCode = mysqli_fetch_array($getTableAirports)) {
              echo "<option value='$getAirportsCode[airports_code]'>$getAirportsCode[airports_name]</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="qty">Quantity</label>
          <input type="number" name="qty" id="qty" class="form-control" min=1 value=1>
        </div>
        <div class="text-center">
          <a href="home-user.php" class="btn btn-danger">Back</a>
          <input type="submit" value="Confirm order" class="btn btn-success" name="submit-order" id="submit-order">
        </div>
      </form>
    </div>

    <?php
    include '../config.php';

    if (isset($_POST['submit-order'])) {
      $username = $_SESSION['username'];

      $order_date = date('Y-m-d');
      $departure = $_POST['departure'];
      $destination = $_POST['destination'];
      $qty = $_POST['qty'];

      $getTableAirports = mysqli_query(
        $connect,
        "SELECT ticket_price, flight_time FROM airports 
        WHERE airports_code = '$departure'"
      );

      while ($getDataTableAirports = mysqli_fetch_array($getTableAirports)) {
        $ticket_price = $getDataTableAirports['ticket_price'];
        $flight_time = $getDataTableAirports['flight_time'];
      }

      $total_price = strval($qty) * $ticket_price;

      $queryOrder = mysqli_query(
        $connect,
        "INSERT INTO orders(username, departure, destination, order_date, flight_time, qty, total_price)
        VALUES ('$username', '$departure', '$destination', '$order_date', '$flight_time', '$qty', '$total_price')"
      );

      header("location: home-user.php");
    }
    ?>
  </div>
</body>

</html>