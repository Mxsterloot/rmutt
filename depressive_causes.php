<?php 
session_start();
require 'dbconfig.php';
if (isset($_POST['submit'])) {
    $username= $_POST['username'];
$password= $conn->real_escape_string($_POST['password']);

$sql ="SELECT * FROM `login` WHERE `username` = '".$username."' AND `password` = '".$password."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result-> fetch_assoc();
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['logined'] = TRUE;
    session_write_close();
    header("Location: index.php");
}else{
    echo "<script>";
    echo "alert('ชื่อผู้ใช้และรหัสผ่านไม่ถูกต้อง');";
    echo "window.location.href='index.php'";
    echo "</script>";
}
}
$datathisuser = mysqli_Fetch_Array(mysqli_query($conn,"SELECT * FROM login Where id='$_SESSION[id]'"));
?>
<!doctype html>
<html lang="en">
<style>
        *{
            font-family: 'Prompt', sans-serif;
        }
    </style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
    <title>RMUTT Counselling</title>

</head>

<body>



    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">RMUTT COUNSELLING</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="about.php">เกี่ยวกับองค์กร <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sad.php">แบบประเมินความเสี่ยง</a>
                </li>
                <?php
                if($_SESSION['logined']===TRUE){ ?>
                    <li class="nav-item">
                     <a class="nav-link" href="">ตารางนัดพบแพทย์</a>
                    </li>
                <?php } ?>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        เกี่ยวกับภาวะซึมเศร้า
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="Depressive_causes.php">สาเหตุอาการภาวะซึมเศร้า</a>
                        <a class="dropdown-item" href="treat.php">วิธีการรักษาเบื้องต้น</a>
                        <a class="dropdown-item" href="side_effect.php">ผลข้างเคียงของยารักษาภาวะซึมเศร้า</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
            </ul>
            <div class="header">
  
</div>


<div class="footer">

</div>
                
                <?php 
                if($_SESSION['logined']==FALSE){ ?>
                    <button class="btn btn-outline-success my-2 my-sm-0" 
                data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">เข้าสู่ระบบ</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เข้าสู่ระบบ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">รหัสบัตรนักศึกษา:</label>
                        <input type="text" name="username" class="form-control" id="recipient-name" required="">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">รหัสผ่าน:</label>
                        <input type="password" name="password" class="form-control" required="">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                <button type="submit" name="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
                </form>
            </div>
        </div>
    </div>
</div>
                <?php }else{ ?>
                    <i class="fa fa-user text-white"> สวัสดีคุณ <?= $datathisuser['name'] ?></i>
                    |<a href="logout.php" class="btn btn-danger"><i class="fa fa-sign-out-alt text-white"></i></a>
                <?php } ?></button>
                
            </form>
        </div>
    </nav>
    

    
    
<h1 align=center style="background-color: #99ffcc;" ><p></p>สาเหตุอาการภาวะซึมเศร้า</h1>
<div class="container">
<p style="font-size:19"><br>&nbsp;&nbsp;<br> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;สาเหตุที่จะกระตุ้นการเกิดภาวะซึมเศร้าที่พบบ่อย  คือ การมีทั้งความเสี่ยงทางพันธุกรรม ทางสภาพจิตใจ<br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;และการเผชิญกับสถานการณ์เลวร้าย ร่วมกันทั้ง 3 ปัจจัย</p>
<p style="font-size:19">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;1. ภาวะซึมเศร้าเกิดจากความเครียด แต่ทั้งนี้คนที่ไม่มีญาติเคยป่วยก็อาจเกิดเป็นโรคนี้ได้ มักพบว่า<br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;ผู้ป่วยโรคนี้จะมีความผิดปกติของระดับสารเคมี ที่เซลล์สมองสร้างขึ้น เพื่อรักษาสมดุลของอารมณ์</p>
<p style="font-size:19">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;2. สภาพทางจิตใจที่เกิดจากการเลี้ยงดู ก็เป็นปัจจัยที่เสี่ยงอีกประการหนึ่งต่อการเกิดโรคซึมเศร้าเช่นกัน <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;คนที่ขาดความภูมิใจในตนเองมองตนเองและโลกที่เขาอยู่ในแง่ลบตลอดเวลา หรือเครียดง่ายเมื่อเจอกับมรสุมชีวิต<br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;ล้วนทำให้เขาเหล่านั้นมีโอกาสป่วยง่ายขึ้น</p>
<p style="font-size:19">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;3. การเผชิญกับสถานการณ์เลวร้าย เช่น หากชีวิตพบกับการสูญเสียครั้งใหญ่ต้องเจ็บป่วยเรื้อรัง <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;ความสัมพันธ์กับคนใกล้ชิดไม่ราบรื่น หรือต้องมีการเปลี่ยนแปลงในทางที่ไม่ปรารถนา ก็อาจกระตุ้นให้โรคซึมเศร้ากำเริบได้</p>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>
    </script>
</body>
</html>