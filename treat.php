
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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

<h1 align=center style="background-color: #99ffcc;"><p></p>วิธีการรักษาเบื้องต้น</h1>
<div class="container">

<p>&nbsp;&nbsp;<br> &emsp;&emsp;&emsp;&emsp;1.  การรักษาด้วยยา การใช้ยาเนื่องจากโรคซึมเศร้าสาเหตุที่พบเกี่ยวข้องกับสารเคมีในสมองดังที่ได้กล่าวแล้วข้างต้น ดังนั้นการให้ยาแก้เศร้า เพื่อไปปรับสมดุลสารเคมีในสมองจึงเป็นสิ่งจำเป็นอย่างมาก ยาแก้เศร้าช่วยบรรเทาอาการเศร้า ทานยาจนรู้สึกดีขึ้นและเมื่อดีขึ้นแล้วควรทานยาต่อไปอีก 6-12 เดือน 
เพื่อป้องกันอาการกลับมาเป็นซ้ำอีก ดังนั้นแม้จะรู้สึกสบายดีก็ยังต้องกินยาตามแพทย์สั่งอย่างต่อเนื่อง 
เพื่อป้องกันการกลับเป็นซ้ำ เนื่องจากผู้ที่เคยป่วยเป็นโรคซึมเศร้ามักจะกลับมาป่วยซ้ำหรืออาจมีอาการ 
กำเริบซ้ำ จึงถือว่าโรคซึมเศร้าเป็นโรคเรื้อรังจำเป็นต้องได้รับยาระยะยาว
</p>
<p>&emsp;&emsp;&emsp;&emsp;2.  การรักษาทางจิตใจ มีวิธีรักษาทางจิตใจอยู่หลายรูปแบบในการช่วยเหลือผู้ป่วยภาวซึมเศร้า ซึ่งอาจเป็นการพูดคุยกับจิตแพทย์ ที่จะช่วยให้ผู้ป่วยเกิดความเข้าใจตนเอง สาเหตุที่ทำให้ตนเองเป็นทุกข์ ซึมเศร้า เข้าใจปัญหาและนำไปสู่การแก้ไขปัญหาได้อย่างเหมาะสมในที่สุด วิธีการที่พบว่าสามารถรักษา
ภาวะซึมเศร้าได้ดี คือ
</p>
<div class="container">
<p style="font-size: 16px">&emsp;&emsp;&emsp;&emsp;2.1   การรักษาแบบปรับความคิดและพฤติกรรม เชื่อว่าอาการของผู้ป่วยมีสาเหตุจากการ
มีแนวคิดที่ไม่ตรงตามความเป็นจริง เพราะในหลายครั้งบางคนทุกข์<br>&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp; เพราะความคิดของตัวเอง เช่น มองตนเองในแง่ลบ มองสิ่งต่างๆแง่ลบ เกินความจริง ดังนั้น การรักษามุ่งแก้ไขแนวคิดของผู้ป่วยให้สอดคล้องกับ
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ความจริงมากขึ้น รวมถึงการปรับพฤติกรรมใช้ทักษะใหม่ที่เหมาะสมมากขึ้นในการแก้ปัญหา
		<p>&emsp;&emsp;&emsp;&emsp;2.2 การรักษาแบบปรับความสัมพันธ์ระหว่างบุคคล การรักษามุ่งให้ผู้ป่วยมีการปรับตัวต่อสิ่งแวดล้อมและผู้อื่นที่ดีขึ้น</p>
		<p>&emsp;&emsp;&emsp;&emsp;2.3 การรักษาจิตบำบัดเชิงลึก เพื่อช่วยให้ผู้ป่วยเข้าใจปมขัดแย้งที่อยู่ในจิตใจตนเอง จนนำมาสู่ภาวะซึมเศร้า</p>
</p>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>
    </script>
</body>

</html>