<?php
include 'server.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">เช่ารถออนไลน์</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">หน้าหลัก</a>
                    </li>
                    <?php
                    if (!isset($_SESSION['username'])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="findcar.php">ค้นหารถเช่า</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-light" href="login.php" role="button">เข้าสู่ระบบ</a>
                        <li class="nav-item">
                            <a class="btn btn-dark" href="register.php" role="button">สมัครสมาชิก</a>
                        </li>
                    <?php
                    } elseif (isset($_SESSION['username'])) {
                    ?>
                        <?php
                        if (($_SESSION['usergroup']) == 'P') {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="findcar.php">ค้นหารถเช่า</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="hispickcar.php">ดูประวัติการเช่ารถ</a>
                            </li>
                        <?php
                        } elseif (($_SESSION['usergroup']) == 'A') { ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="managecar.php">จัดการข้อมูลรถ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="findcar.php">บันทึกการมารับรถ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="findcar.php">บันทึกการคืนรถ</a>
                            </li>
                        <?php
                        } elseif (($_SESSION['usergroup']) == 'W') { ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="findcar.php">ดูรายงานการเช่ารถรายวัน</a>
                            </li>
                            ?>
                        <?php
                        }
                        ?>
                        <li class="nav-item">
                            <a class="btn btn-light" href="logout.php" role="button">ออกจากระบบ</a>
                        <li class="nav-item">
                        <?php
                    } ?>
                </ul>
            </div>
        </div>
    </nav>
    </body>
</html>