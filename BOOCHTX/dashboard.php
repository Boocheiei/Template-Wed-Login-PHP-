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
</head>

<body>

    <div class="container">
        <?php include ('nav.php'); ?>

    </div>

    <!-- Hero -->
    <div class="px-4 py-5 my-5 text-center">


        <!-- <img class="d-block mx-auto mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
        <h1 class="display-5 fw-bold text-body-emphasis">ยินดีต้อนรับคุณ, <?php echo $userData['username'] ?> </h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Email: <?php echo $userData['email'] ?></p>
        </div>
    </div>
    <!-- Hero -->



    <?php include ('footer.php') ?>
    </div>