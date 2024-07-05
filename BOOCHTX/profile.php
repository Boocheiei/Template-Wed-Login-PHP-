<?php
session_start();
require "config.php";

// ตรวจสอบว่ามี session['user_id'] หรือยัง
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit; // จบการทำงานของ script
}

// เรียกใช้งาน $pdo จากไฟล์ config.php

try {
  $user_id = $_SESSION['user_id'];

  // ดึงข้อมูลผู้ใช้จากฐานข้อมูล
  $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
  $stmt->execute([$user_id]);
  $userData = $stmt->fetch();

} catch (PDOException $e) {
  echo "Error:" . $e->getMessage();
}

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

  <main>
    <div class="px-4 py-5 my-5 text-center">

      <a href="assets/img/icon1.png">
        <img src="assets/img/icon1.png" class="rounded-circle" alt="">
      </a>

      <br><br>
      <h1 class="display-5 fw-bold text-body-emphasis">Profile Page</h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">
          ยินดีต้อนรับคุณ, <?php echo $userData['username'] ?></p>
        </p>
        <hr>
        <p>Email: <?php echo $userData['email'] ?></p>
        </p>
        <a href="profile_edit.html" class="btn btn-success px-4 gap-3">แก้ไข Profile</a>
        <a href="upload_profile_img.html" class="btn btn-primary px-4 gap-3">อัพโหลดรูป Profile</a>
      </div>
    </div>
  </main>


  <div class="container">
    <?php include ('footer.php'); ?>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>