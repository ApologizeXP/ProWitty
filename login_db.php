<?php
include 'server.php';
session_start();
$errors = array();
if (isset($_POST['logi'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "กรุณากรอกชื่อผู้ใช้");
        $_SESSION['error'] = "กรุณากรอกชื่อผู้ใช้";
    }
    if (empty($password)) {
        array_push($errors, "กรุณากรอกรหัสผ่าน");
        $_SESSION['error'] = "กรุณากรอกรหัสผ่าน";
    }
    if (count($errors) > 1) {
        $_SESSION['error'] = "กรุณากรอกข้อมูลให้ครบถ้วน";
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND passwd='$password'";
        $results = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($results);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['usergroup'] = $user['usergroup'];
            $_SESSION['idusers'] = $user['idusers'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['username'] = $username;
            header('location: index.php');
        }else{
            $_SESSION['error'] = "กรุณากรอกข้อมูลให้ครบถ้วน";
            header('location: login.php');
        }
    }else {
        header('location: login.php');
    }
}
