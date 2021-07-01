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
  <title>Login</title>
</head>

<body>
  <div class="container">
    <div class="row align-items-start">
      <div class="col">

      </div>
      <div class="col">
        <br>
      </div>
      <div class="col">

      </div>
    </div>
    <div class="row align-items center">
      <div class="col">

      </div>
      <div class="col-6">
        <div class="card border-secondary">
          <div class="card-body">
            <div class="card-title text-center">
              <h3>Login</h3>
            </div>
            <br>
            <form action="" method="post">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
              </div>
              <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Login" name="submit-login" id="submit-login">
                <div class="card-text" style="font-size: 14px;">
                  <br>
                  <br>
                  Belum punya akun? <br>
                  <a href="sign-up.php">Daftar disini</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col">

      </div>
    </div>
    <div class="row align-items end">
      <div class="col">

      </div>
      <div class="col">
        <br>
      </div>
      <div class="col">

      </div>
    </div>
  </div>

  <?php
  include 'config.php';

  if (isset($_POST['submit-login'])) {
    session_start();

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $_SESSION['username'] = $username;

    $getTableLogin = mysqli_query($connect, "SELECT * FROM login WHERE username = '$username' AND password = '$password'");

    while ($getDataLogin = mysqli_fetch_array($getTableLogin)) {
      if ($getDataLogin['role_id'] == 0) {
        header("location: admin/admin-airports.php");
      }

      if ($getDataLogin['role_id'] == 1) {
        header("location: user/home-user.php");
      }
    }
  }
  ?>
</body>

</html>