<?php
include 'server.php';
include 'navbar.php';
$id = $_SESSION['idusers'];
$sql = "SELECT * FROM hiscar WHERE idusers = $id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประวัติการเช่ารถ</title>
</head>

<body>
    <div class="container">
        <div class="text-center mb-4">
            <h1>ประวัติการเช่ารถ</h1>
        </div>
        <table class="table table-dark table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">วันที่จองรถ</th>
                    <th scope="col">วันที่รับรถ</th>
                    <th scope="col">สถานะ</th>
                    <th scope="col">รายละเอียดการเช่ารถ</th>

                </tr>
            </thead>
            <?php
            while ($row = $result->fetch_object()) { ?>
                <tbody>
                    <tr>
                        <td><?php echo $row->dateday; ?></td>
                        <td><?php echo $row->pickdate; ?></td>
                        </td>
                        <td><?php if ($row->statuspay == 'N') { ?>
                                <button type="button" class="btn btn-danger">รอชำระเงิน</button>
                            <?php
                            } elseif ($row->statuspay == 'Y') { ?>
                                <button type="button" class="btn btn-success">ชำระเงินแล้ว</button>
                            <?php
                            }
                            ?>
                        </td>
                        <td>
                            <a class="btn btn-light" href="depickcar.php?id=<?php echo $row->idhiscar; ?>" role="button">รายละเอียดการเช่ารถ</a>
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