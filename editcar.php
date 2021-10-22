<?php
include 'server.php';
include 'navbar.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_set_charset($conn, "utf8");
    $sql = "SELECT * FROM cars WHERE idcar = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขรายละเอียดรถ</title>
</head>

<body>
    <div class="container" style="margin-top: 100px;">
        <div class="card bg-dark text-white">
            <div class="card-header text-center">
            แก้ไขรายละเอียดรถ
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
                <form action="editcar_db.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="file" class="form-label">รูปรถ</label>
                        <input type="file" class="form-control" id="file" name="file" >
                    </div>
                    <div class="mb-3">
                        <label for="carname" class="form-label">ชื่อรถ</label>
                        <input type="text" class="form-control" id="carname" name="carname" value="<?php echo $row['carname'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="detials" class="form-label">รายละเอียดรถ</label>
                        <input type="text" class="form-control" id="detials" name="detials" value="<?php echo $row['detials'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="numcar" class="form-label">เลขทะเบียนรถ</label>
                        <input type="text" class="form-control" id="numcar" name="numcar" value="<?php echo $row['numcar'] ?>">
                        <input type="hidden" class="form-control" id="idcar" name="idcar" value="<?php echo $id ?>">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">สถานะ</label>
                        <select class="form-select" id="status" name="status">
                            <option  value="P" <?php if ( $row['status'] == 'P') { ?> selected <?php } ?>>เช่าได้</option> 
                            <option  value="S" <?php if ( $row['status'] == 'S') { ?> selected <?php } ?>>ไม่ให้เช่า</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="edica" id="edica" class="btn btn-primary ">แก้ไขรายละเอียดรถ</button>
                    </div>
                </form>
                <div class="card-footer text-muted text-center ">
                </div>
            </div>

        </div>
</body>

</html>