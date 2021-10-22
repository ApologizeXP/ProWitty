<?php
include 'server.php';
include 'navbar.php';
if ($_SESSION['usergroup'] != 'A') {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container" style="margin-top: 100px;">
        <div class="card bg-dark text-white">
            <div class="card-header text-center">
                เพิ่มรถใหม่
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
                <form action="newcar_db.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="file" class="form-label">รูปรถ</label>
                        <input type="file" class="form-control" id="file" name="file">
                    </div>
                    <div class="mb-3">
                        <label for="carname" class="form-label">ชื่อรถ</label>
                        <input type="text" class="form-control" id="carname" name="carname">
                    </div>
                    <div class="mb-3">
                        <label for="detials" class="form-label">รายละเอียดรถ</label>
                        <input type="text" class="form-control" id="detials" name="detials">
                    </div>
                    <div class="mb-3">
                        <label for="numcar" class="form-label">เลขทะเบียนรถ</label>
                        <input type="text" class="form-control" id="numcar" name="numcar">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">สถานะ</label>
                        <select class="form-select"id="status" name="status" >
                            <option selected>-- เลื่อกสถานะ --</option>
                            <option value="P">เช่าได้</option>
                            <option value="S">ไม่ให้เช่า</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="newca" id="newca" class="btn btn-primary ">เพิ่มรถใหม่</button>
                    </div>
                </form>
                <div class="card-footer text-muted text-center ">
                </div>
            </div>

        </div>
</body>

</html>