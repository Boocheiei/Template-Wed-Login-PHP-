<?php

session_start();
require 'config.php';
$minLength = 6;

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
}

if (empty($username)) {
    $_SESSION['error'] = "กรอกชื่อใหม่อีกครั้ง";
    header("location: register.php");
    exit();
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "กรอกอีเมลใหม่อีกครั้ง";
    header("location: register.php");
    exit();
} else if (strlen($password) < $minLength) {
    $_SESSION['error'] = "กรอกรหัสผ่านใหม่อีกครั้ง";
    header("location: register.php");
    exit();
} else if ($password !== $confirmPassword) {
    $_SESSION['error'] = "กรอกยืนยันรหัสผ่านใหม่อีกครั้ง";
    header("location: register.php");
    exit();
}   else{
    $checkUsername = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $checkUsername->execute([$username]);
    $userNameExists = $checkUsername->fetchColumn();

    $checkEmail= $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $checkEmail->execute([$email]);
    $userEmailExists = $checkEmail->fetchColumn();

    if($userNameExists){
        $_SESSION["error"] = "มีชื่อนี้ในระบบแล้ว";
        header("location: register.php");
        exit();
    }else if($userEmailExists){
        $_SESSION["error"] = "มีอีเมลนี้ในระบบแล้ว";
        header("location: register.php");
        exit();
    }else{
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try{

            $stmt = $pdo->prepare("INSERT INTO users(username, email, password) VALUES(?, ?, ?)");
            $stmt->execute([$username, $email, $hashedPassword]);

            $_SESSION["success"] = "สมัครเรียบร้อย";
            header("location: register.php");
            exit();

        }catch(PDOException $e){
        $_SESSION["error"] = "กรุณารองใหม่";
        echo "สมัครล้มเหลว" . $e->getMessage();
        header("location: register.php");
        exit();
        }
    
    }
}
?>