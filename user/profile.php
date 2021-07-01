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

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="home-user.php">Your e-Tickets</a></li>
        <li class="breadcrumb-item active" aria-current="page">Profile</li>
      </ol>
    </nav>

    <div class="jumbotron">
      <h1>Profile</h1>
      <hr>

      <?php
      include '../config.php';

      $username = $_SESSION['username'];

      $getTableUsers = mysqli_query(
        $connect,
        "SELECT * FROM users WHERE username = '$username'"
      );

      while ($getUserDataByUsername = mysqli_fetch_array($getTableUsers)) {
        $first_name = $getUserDataByUsername['first_name'];
        $last_name = $getUserDataByUsername['last_name'];
        $phone = $getUserDataByUsername['phone'];
        $address = $getUserDataByUsername['address'];
      }
      ?>

      <form action="" method="post">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" class="form-control" value="<?php echo $username ?>" disabled>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
          <label for="nama-depan">Nama Depan</label>
          <input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo $first_name ?>">
        </div>
        <div class="form-group">
          <label for="nama-belakang">Nama belakang</label>
          <input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo $last_name ?>">
        </div>
        <div class="form-group">
          <label for="telepon">Telepon</label>
          <input type="number" name="phone" id="phone" class="form-control" value="<?php echo $phone ?>">
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label> <br>
          <textarea name="address" id="address" cols="110" rows="5"><?php echo $address ?></textarea>
        </div>
        <div class="text-center">
          <input type="submit" value="Edit Profile" name="submit-edit" id="submit-edit" class="btn btn-primary">
        </div>
      </form>

      <?php
      include '../config.php';

      if (isset($_POST['submit-edit'])) {
        $password = md5($_POST['password']);
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        $queryEditProfile = mysqli_query(
          $connect,
          "UPDATE users SET first_name = '$first_name', 
          last_name = '$last_name', 
          phone = '$phone', 
          address = '$address' 
          WHERE username = '$username'"
        );

        if ($password != NULL) {
          $queryChangePassword = mysqli_query(
            $connect,
            "UPDATE login SET password = '$password'
            WHERE username = '$username'"
          );
        }

        header("location: profile.php");
      }
      ?>
    </div>
  </div>
</body>

</html>