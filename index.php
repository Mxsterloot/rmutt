<<<<<<< Updated upstream
<?php 
require_once 'checkrole.php';
?>
<!doctype html>
<html lang="en">
=======
<?php
session_start();
require 'dbconfig.php';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $conn->real_escape_string($_POST['password']);

    $sql = "SELECT * FROM `login` WHERE `username` = '" . $username . "' AND `password` = '" . $password . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['logined'] = TRUE;
        session_write_close();
        header("Location: index.php");
    } else {
        echo "<script>";
        echo "alert('ชื่อผู้ใช้และรหัสผ่านไม่ถูกต้อง');";
        echo "window.location.href='index.php'";
        echo "</script>";
    }
}
$datathisuser = mysqli_Fetch_Array(mysqli_query($conn, "SELECT * FROM login Where id='$_SESSION[id]'"));
?>
<!doctype html>
<html lang="en">
<style>
    * {
        font-family: 'Prompt', sans-serif;
    }
</style>


>>>>>>> Stashed changes
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
    <title>RMUTT Counselling</title>
    <style>
        * {
            font-family: 'Prompt', sans-serif;
        }
    </style>
</head>
<body>
<<<<<<< Updated upstream
    <?php require_once 'navbar.php'; ?>
=======
    <?php require_once 'components/navbar.php'; ?>
>>>>>>> Stashed changes
    <div class="row">
        <div class="col-sm-4">
            <img src="img/home.jpg" alt="" class="img-fluid">
        </div>
        <div class="col-sm-8">
            <img src="img/logo.png" alt="" class="img-fluid">
            <hr>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/h1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/h2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/h3.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <hr>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>
    </script>
</body>

</html>