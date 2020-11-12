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
            <button type="button" class="btn btn-primary btn-lg btn-block mt-3" data-toggle="modal" data-target="#modelId">
                <i class="fa fa-plus" aria-hidden="true"></i> นัดพบแพทย์
            </button>
            <div class="col-sm-12">
                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">นัดพบแพทย์</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="savemeetdoctor.php" method="post">
                                    <div class="form-group">
                                        <label for="">วันที่จะจอง</label>
                                        <input type="date" class="form-control" name="date" id="date" aria-describedby="helpId" placeholder="" required>
                                        <small id="helpId1" class="form-text text-muted">วันที่จะจอง</small>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="time" value="9">
                                            9.00 น.
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="time" value="10">
                                            10.00 น.
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="time" value="11">
                                            11.00 น.
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="time" value="13">
                                            13.00 น.
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="time" value="14">
                                            14.00 น.
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="time" value="15">
                                            15.00 น.
                                        </label>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">รายการจองแพทย์ทั้งหมด</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">รายการรออนุมัติ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">รายการไม่อนุมัติ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab1" data-toggle="pill" href="#pills-contact1" role="tab" aria-controls="pills-contact1" aria-selected="false">รายการอนุมัติแล้ว</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <table id="allmeetdoctor1" class="display">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>ชื่อผู้เข้าพบแพทย์</th>
                                    <th>วันที่</th>
                                    <th>เวลาเข้าพบแพทย์</th>
                                    <th>สถานะการจอง</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if($_SESSION['role']==1){
                                    $sql = $conn->query("SELECT * FROM meetdr");
                                }elseif($_SESSION['role']==2){
                                    $sql = $conn->query("SELECT * FROM meetdr Where ownerid='$_SESSION[role]'");
                                }
                                
                                while ($datamymeetdr = $sql->fetch_assoc()) {
                                    $dataname = $conn->query("SELECT name FROM login Where id='$datamymeetdr[ownerid]'")->fetch_assoc();
                                ?>
                                    <tr>
                                        <td><?= $datamymeetdr['id'] ?></td>
                                        <td><?= $dataname['name'] ?></td>
                                        <td><?= DateThai($datamymeetdr['date']) ?></td>
                                        <td><?= $datamymeetdr['time'] ?></td>
                                        <td><span class="badge badge-<?= colorbadge($datamymeetdr['status'])  ?>"><?= statusbar($datamymeetdr['status'])  ?></span></td>
                                        <td>
                                            <?php if ($_SESSION['role'] == 1) { ?>
                                                <a href="approve.php?id=<?= $datamymeetdr['id'] ?>" class="btn btn-success">อนุมัติ</a>
                                                <a href="notapprovemymeet.php?id=<?= $datamymeetdr['id'] ?>" class="btn btn-danger">ไม่อนุมัติ</a>
                                            <?php } elseif ($_SESSION['role'] == 2 and $_SESSION['id'] == $datamymeetdr['ownerid']) { ?>
                                                <a href="deletemymeet.php?id=<?= $datamymeetdr['id'] ?>" class="btn btn-danger">ยกเลิกการจอง</a>
                                            <?php } ?>
                                        </td>

                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <table id="allmeetdoctor2" class="display">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>ชื่อผู้เข้าพบแพทย์</th>
                                    <th>วันที่</th>
                                    <th>เวลาเข้าพบแพทย์</th>
                                    <th>สถานะการจอง</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = $conn->query("SELECT * FROM meetdr Where status=0");
                                while ($datamymeetdr = $sql->fetch_assoc()) {
                                    $dataname = $conn->query("SELECT name FROM login Where id='$datamymeetdr[ownerid]'")->fetch_assoc();
                                ?>
                                    <tr>
                                        <td><?= $datamymeetdr['id'] ?></td>
                                        <td><?= $dataname['name'] ?></td>
                                        <td><?= DateThai($datamymeetdr['date']) ?></td>
                                        <td><?= $datamymeetdr['time'] ?></td>
                                        <td><span class="badge badge-<?= colorbadge($datamymeetdr['status'])  ?>"><?= statusbar($datamymeetdr['status'])  ?></span></td>
                                        <td>
                                            <?php if ($_SESSION['role'] == 1) { ?>
                                                <a href="approve.php?id=<?= $datamymeetdr['id'] ?>" class="btn btn-success">อนุมัติ</a>
                                                <a href="notapprovemymeet.php?id=<?= $datamymeetdr['id'] ?>" class="btn btn-danger">ไม่อนุมัติ</a>
                                            <?php } elseif ($_SESSION['role'] == 2 and $_SESSION['id'] == $datamymeetdr['ownerid']) { ?>
                                                <a href="deletemymeet.php?id=<?= $datamymeetdr['id'] ?>" class="btn btn-danger">ยกเลิกการจอง</a>
                                            <?php } ?>
                                        </td>

                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <table id="allmeetdoctor3" class="display">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>ชื่อผู้เข้าพบแพทย์</th>
                                    <th>วันที่</th>
                                    <th>เวลาเข้าพบแพทย์</th>
                                    <th>สถานะการจอง</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = $conn->query("SELECT * FROM meetdr Where status BETWEEN 2 AND 3");
                                while ($datamymeetdr = $sql->fetch_assoc()) {
                                    $dataname = $conn->query("SELECT name FROM login Where id='$datamymeetdr[ownerid]'")->fetch_assoc();
                                ?>
                                    <tr>
                                        <td><?= $datamymeetdr['id'] ?></td>
                                        <td><?= $dataname['name'] ?></td>
                                        <td><?= DateThai($datamymeetdr['date']) ?></td>
                                        <td><?= $datamymeetdr['time'] ?></td>
                                        <td><span class="badge badge-<?= colorbadge($datamymeetdr['status'])  ?>"><?= statusbar($datamymeetdr['status'])  ?></span></td>
                                        <td>
                                            <?php if ($_SESSION['role'] == 1) { ?>
                                                <a href="approve.php?id=<?= $datamymeetdr['id'] ?>" class="btn btn-success">อนุมัติอีกครั้ง</a>
                                            <?php } elseif ($_SESSION['role'] == 2 and $_SESSION['id'] == $datamymeetdr['ownerid']) { ?>
                                                <a href="deletemymeet.php?id=<?= $datamymeetdr['id'] ?>" class="btn btn-danger">ยกเลิกการจอง</a>
                                            <?php } ?>
                                        </td>

                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="pills-contact1" role="tabpanel" aria-labelledby="pills-contact-tab1">
                        <table id="allmeetdoctor4" class="display">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>ชื่อผู้เข้าพบแพทย์</th>
                                    <th>วันที่</th>
                                    <th>เวลาเข้าพบแพทย์</th>
                                    <th>สถานะการจอง</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = $conn->query("SELECT * FROM meetdr Where status=1");
                                while ($datamymeetdr = $sql->fetch_assoc()) {
                                    $dataname = $conn->query("SELECT name FROM login Where id='$datamymeetdr[ownerid]'")->fetch_assoc();
                                ?>
                                    <tr>
                                        <td><?= $datamymeetdr['id'] ?></td>
                                        <td><?= $dataname['name'] ?></td>
                                        <td><?= DateThai($datamymeetdr['date']) ?></td>
                                        <td><?= $datamymeetdr['time'] ?></td>
                                        <td><span class="badge badge-<?= colorbadge($datamymeetdr['status'])  ?>"><?= statusbar($datamymeetdr['status'])  ?></span></td>
                                        <td>
                                            <?php if ($_SESSION['role'] == 1) { ?>
                                                <a href="approve.php?id=<?= $datamymeetdr['id'] ?>" class="btn btn-success">อนุมัติ</a>
                                                <a href="notapprovemymeet.php?id=<?= $datamymeetdr['id'] ?>" class="btn btn-danger">ไม่อนุมัติ</a>
                                            <?php } elseif ($_SESSION['role'] == 2 and $_SESSION['id'] == $datamymeetdr['ownerid']) { ?>
                                                <a href="deletemymeet.php?id=<?= $datamymeetdr['id'] ?>" class="btn btn-danger">ยกเลิกการจอง</a>
                                            <?php } ?>
                                        </td>

                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>

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