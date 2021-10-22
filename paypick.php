<?php
include 'server.php';
include 'navbar.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM hiscar WHERE idhiscar = '$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_object();
    $manyday = $row->manyday;
    $total = $manyday * 100;
    $totals = $total / $manyday;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ชำระเงิน</title>
</head>

<body>
    <div class="container" style="margin-top: 250px;">
        <div class="card bg-dark text-white">
            <div class="card-header text-center">
                ชำระเงิน
            </div>
            <div class="card-body">
                <?php
                if (isset($_SESSION['error'])) :
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                        ?>
                    </div>
                <?php
                endif
                ?>
                <form action="paypick_db.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">ราคาการเช่ารถ</label>
                        <br>
                        <label for="file" class="form-label">จำนวนวันทีต้องการเช่ารถ :</label>
                        <?php echo $row->manyday; ?> วัน * 100 บาท
                        <br>
                        <label for="file" class="form-label">ราคาต่อวัน :</label>
                         <?php echo $totals; ?> บาท
                        <br>
                        <label for="file" class="form-label">รวม :</label>
                        <?php echo $total; ?> บาท
                    </div>
                    <div class="mb-3">
                        <label for="credit" class="form-label">บัตรเครดิต</label>
                        <input type="text" class="form-control" id="credit" name="credit" minlength="13" maxlength="13">
                    </div>
                    <div class="text-center">
                        <input type="hidden" name="idhiscar" value="<?php echo $id ?>">
                        <input type="hidden" name="idcar" value="<?php echo $row->idcar; ?>">
                        <button type="submit" name="pay" id="pay" class="btn btn-primary ">ชำระเงิน</button>
                    </div>
                </form>
            </div>
        </div </body>

</html>