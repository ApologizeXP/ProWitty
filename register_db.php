<?php
include 'server.php';
session_start();
$errors = array();
if (isset($_POST['resgit'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $idcode = mysqli_real_escape_string($conn, $_POST['idcode']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($fullname)) {
        array_push($errors, "กรุณากรอกชื่อ-นามสกุล");
        $_SESSION['error'] = "กรุณากรอกชื่อ-นามสกุล";
    }
    if (empty($address)) {
        array_push($errors, "กรุณากรอกที่อยู่");
        $_SESSION['error'] = "กรุณากรอกที่อยู่";
    }
    if (empty($idcode)) {
        array_push($errors, "กรุณากรอกเลขบัญประชาชน");
        $_SESSION['error'] = "กรุณากรอกเลขบัญประชาชน";
    }
    if (empty($email)) {
        array_push($errors, "กรุณากรอกอีเมล์");
        $_SESSION['error'] = "กรุณากรอกอีเมล์";
    }
    if (empty($username)) {
        array_push($errors, "กรุณากรอกชื่อผู้ใช้");
        $_SESSION['error'] = "กรุณากรอกชื่อผู้ใช้";
    }
    if (empty($password)) {
        array_push($errors, "กรุณากรอกรหัสผ่าน");
        $_SESSION['error'] = "กรุณากรอกรหัสผ่าน";
    }

    if(count($errors) > 1){
        $_SESSION['error'] = "กรุณากรอกข้อมูลให้ครบถ้วน";
    }

    $user_check_query = "SELECT * FROM users WHERE idcode='$idcode' OR email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { 
        if ($user['idcode'] === $idcode) {
            array_push($errors, "เลขบัญประชาชนมีการใช้อยู่แล้ว");
            $_SESSION['error'] = "เลขบัญประชาชนมีการใช้อยู่แล้ว";
        }

        if ($user['email'] === $email) {
            array_push($errors, "อีเมล์มีการใช้อยู่แล้่ว");
            $_SESSION['error'] = "อีเมล์มีการใช้อยู่แล้่ว";
        }
    }

   
    if (count($errors) == 0) {
        $password1 = md5($password);

        $query = "INSERT INTO users (fullname,address,idcode,email,username,passwd,usergroup) 
  			  VALUES('$fullname','$address','$idcode','$email','$username','$password1','P')";
        mysqli_query($conn, $query);
        header('location: index.php');
    }else{
        
        header('location: register.php');
    }
}