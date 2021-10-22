<?php
include 'server.php';
include 'navbar.php';
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
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="text-center mb-4">
            <h1><?php echo $row->carname; ?></h1>
        </div>
    
    <div class="row">
        <div class="col">
           <img src="images/<?php echo $row->imagecar; ?>" alt="img" style="width: 500px; height: 500;">
        </div>
        <div class="col">
        <p>รายละเอียดรถ :</p>
        <?php echo $row->detials; ?>
        </div>
        <div class="col">
        <p>เลขทะเบียนรถ :</p>
        <?php echo $row->numcar; ?>
        </div>
        <div class="col">
        <a class="btn btn-dark" href="pickcar.php?id=<?php echo $id; ?> " role="button">เช่ารถ</a>
        </div>
    </div>
    </div>
</body>

</html>