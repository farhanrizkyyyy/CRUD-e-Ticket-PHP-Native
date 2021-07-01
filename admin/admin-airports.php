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
        <li class="breadcrumb-item active" aria-current="page">Airports</li>
        <li class="breadcrumb-item"><a href="admin-users.php">Users</a></li>
        <li class="breadcrumb-item"><a href="admin-orders.php">Orders</a></li>
      </ol>
    </nav>

    <br>
    <h4>List of Airports</h4>
    <br>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th></th>
            <th>Airport's Code</th>
            <th>Airport's Name</th>
            <th>Flight Time</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            include '../config.php';

            $num = 1;

            $getTableAirports = mysqli_query(
              $connect,
              "SELECT airports_code, airports_name, flight_time FROM airports
              ORDER BY airports_code"
            );

            while ($getDataTableAirport = mysqli_fetch_array($getTableAirports)) {
            ?>
              <td><?php echo $num++ ?></td>
              <td><?php echo $getDataTableAirport['airports_code']; ?></td>
              <td><?php echo $getDataTableAirport['airports_name']; ?></td>
              <td><?php echo $getDataTableAirport['flight_time']; ?></td>
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