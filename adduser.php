<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'checkrole.php';
if ($_SESSION['id'] == "") {
    header("location: index.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <title>RMUTT Counselling</title>
    <style>
        * {
            font-family: 'Prompt', sans-serif;
        }
    </style>
</head>

<body>
    <?php require_once 'banner.php'; ?>
    <?php require_once 'navbar.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            <h1>เพิ่มผู้ใช้งานประจำ</h1>
                <div class="form-group">
                    <label for="">ชื่อ-นามสกุล</label>
                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="ชื่อ-นามสกุล">
                </div>
                <div class="form-group">
                    <label for="">ชื่อเล่น</label>
                    <input type="text" class="form-control" name="nickname" id="nickname"  placeholder="ชื่อเล่น">
                </div>
                <div class="form-group">
                    <label for="">รหัสประจำตัวนักศึกษา</label>
                    <input type="text" class="form-control" name="nisit_id" id="nisit_id" placeholder="รหัสประจำตัวนักศึกษา">
                </div>
                <div class="form-group">
                    <label for="">วันเดือนปีเกิด</label>
                    <input type="text" class="form-control" name="birthday" id="birthday" placeholder="วันเดือนปีเกิด">
                </div>
                <div class="form-group">
                    <label for="">อายุ</label>
                    <input type="text" class="form-control" name="age" id="age" placeholder="อายุ">
                </div>
                <label>เพศ</label>
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="gender" id="gender1" value="ชาย">
                    ชาย
                  </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="gender" id="gender2" value="หญิง">
                    หญิง
                  </label>
                </div>
                <div class="form-group">
                    <label for="">เบอร์โทรศัพท์</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="เบอร์โทรศัพท์">
                </div>
                <?php 
                $sqlallfaculty = $conn->query("SELECT * FROM faculty");
                while($dataallfaculty = $sqlallfaculty->fetch_assoc()){?>
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="faculty" id="faculty" value="<?= $dataallfaculty['id'] ?>"><?= $dataallfaculty['name'] ?>
                  </label>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#allmeetdoctor1').DataTable();
            $('#allmeetdoctor2').DataTable();
            $('#allmeetdoctor3').DataTable();
            $('#allmeetdoctor4').DataTable();
        });
    </script>
</body>

</html>