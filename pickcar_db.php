<?php
include 'server.php';
session_start();
$errors = array();
if (isset($_POST['pick'])) {
    $dateday = date("Y-m-d");
    $idcar = $_POST['id'];
    $idusers = $_SESSION['idusers'];
    $pickdate = mysqli_real_escape_string($conn, $_POST['pickdate']);
    $manyday = mysqli_real_escape_string($conn, $_POST['manyday']);
    $confirmpick = mysqli_real_escape_string($conn, $_POST['confirmpick']);

    if (empty($pickdate)) {
        array_push($errors, "กรุณากรอกวันที่จะรับรถ");
        $_SESSION['error'] = "กรุณากรอกวันที่จะรับรถ";
    }
    if (empty($manyday)) {
        array_push($errors, "กรุณากรอกจำนวนวันที่จะเช่ารถ");
        $_SESSION['error'] = "กรุณากรอกจำนวนวันที่จะเช่ารถ";
    }
    if (empty($confirmpick)) {
        array_push($errors, "กรุณากรอกยืนยันการเช่ารถ");
        $_SESSION['error'] = "กรุณากรอกยืนยันการเช่ารถ";
    }
    if (count($errors) > 1) {
        $_SESSION['error'] = "กรุณากรอกข้อมูลให้ครบถ้วน";
    }

    if (count($errors) == 0) {
        $query = "INSERT INTO hiscar (dateday,pickdate,manyday,statuspay,idcar,idusers) VALUES('$dateday','$pickdate','$manyday','N','$idcar','$idusers')";
        mysqli_query($conn, $query);
        header('location: hispickcar.php');
    } else {

        header('location: pickcar.php?id=' . $idcar . '');
    }
}
