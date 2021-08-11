<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/main.css">

</head>

<body>

  <?php

  include_once("config_login.php");
  include_once("db.php");
  
  session_start();

  define("MAX_FAILS", "3");
  
  if (!isset($_SESSION['fails'])) {
    $_SESSION['fails'] = 0;
  }

  $usr = $_POST['username'];

  $pass = $_POST['password'];

  $newPass = md5($pass);

  $conn = new db();

  $sql = "select * from usuarios where (username='$usr' or email='$usr') and (password='$newPass') and (Activo = 'Si')";

  $result = $conn->query($sql);

  $row = $result->fetch_assoc();


  if ($row == NULL) {
    $_SESSION['fails'] += 1;
    echo $_SESSION['fails'];
    if ($_SESSION['fails'] == MAX_FAILS) {
  ?>
      <div class="alert alert-danger">
        <a href="/index.php" class="close" data-dismiss="alert">×</a>
        <div class="text-center">
          <h5><strong>¡Error!</strong> Maxima cantidad de Intentos.</h5>
          <?php
          session_destroy();
          ?>
        </div>
      </div>
    <?php
    } else {
    ?>
      <div class="alert alert-danger">
        <a href="../login.html" class="close" data-dismiss="alert">×</a>
        <div class="text-center">
          <h5><strong>¡Error!</strong> Login Invalido.</h5>
        </div>

      </div>
  <?php
    }
  } else {
    session_start();
    $_SESSION['time'] = date('H:i:s');
    $_SESSION['username'] = $usr;
    $_SESSION['logueado'] = true;
    header("location:welcome.php");
  }


  $conn->close();

  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>