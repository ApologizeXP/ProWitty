<?php
session_start();
include('server.php');
$errors = array();
$idhiscar = $_POST['idhiscar'];
$idcar = $_POST['idcar'];
$id = $_SESSION['idusers'];
if (isset($_POST['pay'])) {
    $credit = mysqli_real_escape_string($conn, $_POST['credit']);


    if (empty($credit)) {
        array_push($errors, "กรุณากรอกบัตรเครดิต");
        $_SESSION['error'] = "กรุณากรอกบัตรเครดิต";
    }

    if (count($errors) == 0) {
        $sql = " UPDATE hiscar SET statuspay='Y' WHERE idhiscar = '$idhiscar' ";
        mysqli_query($conn, $sql);
        $sql1 = "UPDATE cars SET status='S',idusers='$id' WHERE idcar = '$idcar' ";
        mysqli_query($conn, $sql1);
        header('location: hispickcar.php');
    } else {
        header('location: paypick.php?id=' . $idhiscar . ' ');
    }
}
