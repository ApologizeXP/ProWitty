<?php
include 'server.php';
include 'navbar.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM hiscar INNER JOIN cars ON hiscar.idcar = cars.idcar WHERE hiscar.idhiscar = '$id' ";
    $result = $conn->query($sql);
    $row = $result->fetch_object();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดการเช่ารถ</title>
</head>

<body>
    <div class="container">
        <div class="text-center mb-4">
            <h1>รายละเอียดการเช่ารถ</h1>
        </div>
        <div class="row">
            <div class="col mb-4">
                <img src="images/<?php echo $row->imagecar; ?>" alt="img" style="width: 500px; height: 500;">
            </div>
            <div class="col mb-4">
                <label for="file" class="form-label">รถ :</label>
                <?php echo $row->carname; ?>
                <br>
                <label for="file" class="form-label">รายละเอียดรถ :</label>
                <?php echo $row->detials; ?>
                <br>
                <label for="file" class="form-label">เลขทะเบียนรถ :</label>
                <?php echo $row->numcar; ?>
                <br>
                <label for="file" class="form-label">วันที่จองรถ :</label>
                <?php echo $row->dateday; ?> 
                <br>
                <label for="file" class="form-label">วันที่รับรถ :</label>
                <?php echo $row->pickdate; ?>
                <br>
                <label for="file" class="form-label">จำนวนวันทีต้องการเช่ารถ :</label>
                <?php echo $row->manyday; ?> วัน
                <br>
                <label for="file" class="form-label">สถานะการชำระเงิน :</label>
                <?php if ($row->statuspay == 'N') { ?>
                    <button type="button" class="btn btn-danger">รอชำระเงิน</button>
                    <a class="btn btn-dark" href="paypick.php?id=<?php echo $id; ?> " role="button">ชำระเงิน</a>
                <?php
                } elseif ($row->statuspay == 'Y') { ?>
                    <button type="button" class="btn btn-success">ชำระเงินแล้ว</button>
                <?php
                }
                ?>
                <br>
            </div>
        </div>
    </div>
</body>

</html>