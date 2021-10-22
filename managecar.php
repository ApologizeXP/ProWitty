<?php
include 'server.php';
include 'navbar.php';
if ($_SESSION['usergroup'] != 'A') {
    header('location: index.php');
}
$sql = "SELECT * FROM cars ";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการข้อมูลรถ</title>
</head>

<body>
    <div class="container">
        <div class="text-center mb-4">
            <h1>จัดการข้อมูลรถ</h1>
            <a class="btn btn-dark" href="newcar.php" role="button">เพิ่มรถใหม่</a>
        </div>
    <table class="table table-dark table-striped text-center">
        <thead>
            <tr>
                <th scope="col">เลขที่รถ</th>
                <th scope="col">รูปรถ</th>
                <th scope="col">รถ</th>
                <th scope="col">รายละเอียดรถ</th>
                <th scope="col">เลขทะเบียนรถ</th>
                <th scope="col">สถานะ</th>
                <th scope="col">เมนู</th>
            </tr>
        </thead>
        <?php
        while ($row = $result->fetch_object()) { ?>
            <tbody>
                <tr>
                    <th><?php echo $row->idcar; ?></th>
                    <td>
                        <img src="images/<?php echo $row->imagecar; ?>" alt="img" style="width: 100px; height: 100px;">
                    </td>
                    <td><?php echo $row->carname; ?></td>
                    <td><?php echo $row->detials; ?></td>
                    <td><?php echo $row->numcar; ?></td>
                    <td><?php if ($row->status == 'P') { ?>
                        <button type="button" class="btn btn-success">เช่าได้</button>
                        <?php
                        } elseif ($row->status == 'S') { ?>
                        <button type="button" class="btn btn-danger">ไม่ให้เช่า</button>
                        <?php
                        }
                        ?>
                    </td>
                    <td>
                        <a class="btn btn-light" href="editcar.php?id=<?php echo $row->idcar; ?>" role="button">แก้ไข</a>
                    </td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>
    </div>
</body>

</html>