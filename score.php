<?php

?>
<html>

<head>
  <title>แบบทดสอบภาวะซึมเศร้า</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-10">
        <?php

        require 'connect.php';

        $sqlquestion = mysqli_query($conn, "SELECT * FROM question");
        while ($dataquestion = mysqli_fetch_array($sqlquestion)) { ?>


          <tr>
            <p align="center" style="color:#FF6633; font-size:32px"> รวมผลคะแนน <br>
              <td> <?= $dataquestion['q_sum'] ?></td>
          </tr>

          <table width="50%" border="1" align="center" cellpadding="0" cellspacing="0">

            <tr align="center" bgcolor="#E0FFFF">
              <td height="30" style="font-size:17px"><strong>ระดับคะแนนของคุณอยู่ในช่วง 0 - 4</strong></td>
            </tr>

            <tr align="center" bgcolor="#FFFFFF">
              <td height="30" style="font-size:18px"><strong><u>ผลการทดสอบ</u></strong><br>
                <p>ท่านไม่มีอาการซึมเศร้าหรือมีก็เพียงเล็กน้อย</p> <strong><u>ข้อแนะนำในการดูแล</u></strong>
                <p>ไม่จำเป็นต้องรักษา</p>
              </td>
            </tr>

          </table><br>

        <?php } ?>



      </div>
      <div class="col-md-1"></div>
    </div>
  </div>
</body>

</html>