<!-- Navbar -->
<header
  class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
  <style>
    .sriracha-regular {
      font-family: 'Sriracha', sans-serif;
    }
  </style>
  <div class="col-md-3 mb-2 mb-md-0">
    <a href="index.php" class="d-inline-flex link-body-emphasis text-decoration-none sriracha-regular fs-3">
      BOOCHTX
    </a>
  </div>

  <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 sriracha-regular">
    <li><a href="index.php" class="nav-link px-2">หน้าแรก</a></li>
    <li><a href="#" class="nav-link px-2">รายการ</a></li>
    <li><a href="#" class="nav-link px-2">ข้อมูล</a></li>
    <li><a href="#" class="nav-link px-2">ติดต่อ</a></li>
    <li><a href="#" class="nav-link px-2">เกี่ยบกับ</a></li>
  </ul>

  <div class="col-md-3 text-end">
    <?php if (!isset($_SESSION['user_id'])) { ?>

      <a href="login.php" class="btn btn-outline-primary me-2 sriracha-regular ">เข้าสู่ระบบ</a>
      <a href="register.php" class="btn btn-primary sriracha-regular">สมัครสมาชิก</a>
    <?php } else { ?>

      <a href="profile.php" class="navbar-brand sriracha-regular "><?php echo $userData['username'] ?>
        <img src="assets/img/icon1.png" alt="" width="30" height="30">
      </a>
      <a href="logout.php" class="btn btn-danger sriracha-regular">ออกจากระบบ</a>
    <?php } ?>


  </div>
</header>
<!-- Navbar -->