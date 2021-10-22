<?php
include 'server.php';
include 'navbar.php';
if (!isset($_SESSION['usergroup'])) {
    header('location: login.php');
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM cars WHERE idcar = $id";
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
    <title>เช่ารถ</title>

<body>
    <div class="container">
        <div class="text-center mb-4">
            <h1><?php echo $row->carname; ?></h1>
        </div>
        <div class="row">
            <div class="col mb-4">
                <img src="images/<?php echo $row->imagecar; ?>" alt="img" style="width: 500px; height: 500;">
            </div>
            <div class="col mb-4 ">
                <p>รายละเอียดรถ :</p>
                <?php echo $row->detials; ?>
                <br>
                <br>
                <p>เลขทะเบียนรถ :</p>
                <?php echo $row->numcar; ?>
            </div>
            <div class="col mb-4">
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
                <form action="pickcar_db.php" method="post">
                    <div class="mb-3">
                        <label for=pickdate"" class="form-label">วันที่รับรถ</label>
                        <input type="date" class="form-control" id="pickdate" name="pickdate">
                    </div>
                    <div class="mb-3">
                        <label for="manyday" class="form-label">จำนวนวันทีต้องการเช่ารถ</label>
                        <input type="number" class="form-control" id="manyday" name="manyday">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="confirmpick" name="confirmpick">
                        <label class="form-check-label" for="">ยืนยันการเช่า</label>
                    </div>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id ?>">
                    <button type="submit" id="pick" name="pick" class="btn btn-primary">เช่ารถ</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>