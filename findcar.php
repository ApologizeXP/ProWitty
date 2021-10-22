<?php
include 'server.php';
include 'navbar.php';
if (isset($_SESSION['usergroup'])) {
    if ($_SESSION['usergroup'] != 'P') {
        header('location: index.php');
    }
}
$sql = "SELECT * FROM cars WHERE status ='P'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ค้นหารถเช่า</title>
</head>

<body>
    <div class="container">
        <div class="text-center">
            <h1>ค้นหารถเช่า</h1>
        </div>
        <form action="search.php" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" placeholder="Search">
                <button class="btn btn-outline-secondary" type="submit" id="search">ค้นหา</button>
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
</body>

</html>