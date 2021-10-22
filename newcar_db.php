<?php
session_start();
include('server.php');
$errors = array();
if(isset($_POST['newca'])){
    if (isset($_FILES['file'])) {
        echo "<pre>";
        print_r($_FILES['file']);
        echo "</pre>";

        $file_name = $_FILES['file']['name'];
        $file_type = $_FILES['file']['type'];
        $file_size = $_FILES['file']['size'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $error = $_FILES['file']['error'];


        if ($file_size > 10000000) {
            array_push($errors, "ไฟล์ขนาดใหญ่เกิน");
            $_SESSION['error'] = "ไฟล์ขนาดใหญ่เกิน";
        } else {
            $file_ex = pathinfo($file_name, PATHINFO_EXTENSION);
            $file_ex_lc = strtolower($file_ex);

            $allowd_exs = array("jpg", "jpeg", "png");
            if (in_array($file_ex_lc, $allowd_exs)) {
                $new_file_name = $file_name;
                $file_upload_path = 'images/' . $new_file_name;
                move_uploaded_file($tmp_name, $file_upload_path);
            } else {
                array_push($errors, "ไม่สามารถอัปโหลดไฟล์นามสกุลนี้ได้");
                $_SESSION['error'] = "ไม่สามารถอัปโหลดไฟล์นามสกุลนี้ได้";
            }
        }
    }
    $carname = mysqli_real_escape_string($conn, $_POST['carname']);
    $detials = mysqli_real_escape_string($conn, $_POST['detials']);
    $numcar = mysqli_real_escape_string($conn, $_POST['numcar']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    if (empty($carname)) {
        array_push($errors, "กรุณากรอกชื่อรถ");
        $_SESSION['error'] = "กรุณากรอกชื่อรถ";
    }
    
    if (empty($detials)) {
        array_push($errors, "กรุณากรอกรายละเอียดรถ");
        $_SESSION['error'] = "กรุณากรอกรายละเอียดรถ";
    }

    if (empty($numcar)) {
        array_push($errors, "กรุณากรอกทะเบียนรถ");
        $_SESSION['error'] = "กรุณากรอกรายละเอียดรถ";
    }

    if (empty($status)) {
        array_push($errors, "กรุณาเลือกสถานะ");
        $_SESSION['error'] = "กรุณาเลือกสถานะ";
    }
    
    if (count($errors) >> 1) {
        $_SESSION['error'] = "กรุณากรอกข้อมูลให้ครบถ้วน";
    }

    if (count($errors) == 0) {
        $query = "INSERT INTO cars (imagecar, carname,detials,numcar,status) 
  			  VALUES('$new_file_name', '$carname','$detials','$numcar','$status')";
        mysqli_query($conn, $query);
        header('location: managecar.php');
    } else {
    
        header('location: newcar.php');
    }
}
