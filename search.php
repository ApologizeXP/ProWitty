<?php
include 'server.php';
include 'navbar.php';
if (isset($_POST["search"])) {
    $search = $_POST["search"];
    $sql = "SELECT * FROM cars WHERE carname  LIKE '%$search%' ";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);
} else {
    header("location:findcar.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gluten:wght@100;300&display=swap" rel="stylesheet">

</head>


<body>
    <?php if ($count > 0) { ?>
        <div class="container">
            <div class="text-center">
                <h1>ค้นหารถเช่า</h1>
            </div>
            <form action="search.php" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Search">
                    <button class="btn btn-outline-secondary" type="submit" id="search">Search</button>
                </div>
            </form>
            <div class="row">
                <?php
                while ($row = $result->fetch_object()) { ?>
                    <div class="col mb-4">
                        <div class="card" style="width: 18rem;">
                            <img src="images/<?php echo $row->imagecar; ?>" class="card-img-top" alt="img">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?php echo $row->carname; ?></h5>
                                <p class="card-text">เลขทะเบียนรถ : <?php echo $row->numcar; ?></p>
                            </div>
                            <div class="card-body text-center">
                                <a class="btn btn-dark" href="detailcar.php?id=<?php echo $row->idcar; ?>" role="button">รายละเอียดรถ</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    <?php } else { ?>
        <div class="container">
            <form action="search.php" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Search">
                    <button class="btn btn-outline-secondary" type="submit" id="search">Search</button>
                </div>
            </form>
        </div>

        <div class="alert alert-danger">

            <center>
                <h1>ไม่เจอข้อมูล</h1>
                <h3>ขอโทษ ทางเราไม่มีรถประเภทนี้</h3>
            </center>
        </div>
    <?php } ?>
</body>

</html>