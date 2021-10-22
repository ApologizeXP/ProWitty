<?php
include 'server.php';
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container" style="margin-top: 100px;">
        <div class="card bg-dark text-white">
            <div class="card-header text-center">
                สมัครสมาชิก
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
                <form action="register_db.php" method="post">
                    <div class="mb-3">
                        <label for="fullname" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="fullname" name="fullname">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">ที่อยู่</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="mb-3">
                        <label for="idcode" class="form-label">เลขบัตรประชาชน</label>
                        <input type="text" class="form-control" id="idcode" name="idcode" minlength="13" maxlength="13">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">อีเมล์</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">รหัสผ่าน</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="text-center">
                        <button type="submit" name="resgit" id="resgit" class="btn btn-primary ">สมัครสมาชิก</button>
                    </div>
                </form>
                <div class="card-footer text-muted text-center ">
                    หากมีเคยสมัครสมาชิกแล้ว <a href="login.php" style="color: white;">" เข้าสู่ระบบ "</a>
                </div>
            </div>

        </div>

</body>

</html>