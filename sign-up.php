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
  <title>Daftar Akun</title>
</head>

<body>
  <div class="container">
    <div class="row align-items start">
      <div class="col">

      </div>
      <div class="col">
        <br>
      </div>
      <div class="col">

      </div>
    </div>
    <div class="row align-items-center">
      <div class="col">

      </div>
      <div class="col-6">
        <div class="card border-secondary">
          <div class="card-body">
            <div class="card-title text-center">
              <h3>Daftar akun</h3>
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
              <div class="form-group">
                <label for="nama-depan">Nama Depan</label>
                <input type="text" name="nama-depan" id="nama-depan" class="form-control">
              </div>
              <div class="form-group">
                <label for="nama-belakang">Nama belakang</label>
                <input type="text" name="nama-belakang" id="nama-belakang" class="form-control">
              </div>
              <div class="form-group">
                <label for="telepon">Telepon</label>
                <input type="number" name="telepon" id="telepon" class="form-control">
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label> <br>
                <textarea name="alamat" id="alamat" cols="51" rows="5"></textarea>
              </div>
              <div class="text-center">
                <input type="submit" value="Daftar" name="submit-daftar" id="submit-daftar" class="btn btn-primary">
                <div class="card-text" style="font-size: 14px;">
                  <br>
                  <br>
                  Sudah punya akun? <br>
                  <a href="index.php">Masuk disini</a>
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

  if (isset($_POST['submit-daftar'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama_depan = $_POST['nama-depan'];
    $nama_belakang = $_POST['nama-belakang'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];

    $daftarUser = mysqli_query($connect, "INSERT INTO users
    (username, first_name, last_name, phone, address) VALUES
    ('$username', '$nama_depan', '$nama_belakang', '$telepon', '$alamat')");

    $daftarLogin = mysqli_query($connect, "INSERT INTO login
    (username, password, role_id) VALUES
    ('$username', '$password', 1)");

    header("location: index.php");
  }
  ?>
</body>

</html>