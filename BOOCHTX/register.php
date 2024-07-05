<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="custom.css">
</head>

<body>

  <div class="container">
    <?php include ('nav.php'); ?>

  </div>

  <main class="form-signin w-100 m-auto ">
    <form action="register_db.php" method="POST">
      <h1 class="text-center h3 mb-3 fw-normal sriracha-regular">สมัครสมาชิก</h1>

      <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success" role="alert">
          <?php
          echo $_SESSION['success'];
          unset($_SESSION['success']);
          ?>
        </div>


      <?php } ?>

      <?php if (isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger" role="alert">
          <?php
          echo $_SESSION['error'];
          unset($_SESSION['error']);
          ?>
        </div>


      <?php } ?>


      <div class="form-floating">
        <input type="text" class="form-control" name="username" id="floatingInput" placeholder="Enter your username">
        <label for="floatingInput">Username</label>
      </div>

      <div class="form-floating">
        <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" name="confirm_password" id="floatingPassword"
          placeholder="Confirm Password">
        <label for="floatingPassword">Confirm Password</label>
        <br>
      </div>

      <button class="btn btn-primary w-100 py-2 sriracha-regular" name="register" type="submit">สมัครสมาชิก</button>
      <p class="mt-5 mb-3 text-body-secondary">© 2017–2023</p>
    </form>
  </main>


  <div class="container">
    <?php include ('footer.php'); ?>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>