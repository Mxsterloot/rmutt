<nav class="navbar navbar-expand-lg navbar-white bg-white text-white">
    <a class="navbar-brand" href="index.php">Home</a>
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
            if ($_SESSION['logined'] === TRUE) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="meetdoctor.php">ตารางนัดพบแพทย์</a>
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
        if ($_SESSION['logined'] == FALSE) { ?>
            <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">เข้าสู่ระบบ</button>
            <div class="modal fade text-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <label for="recipient-name" class="col-form-label">username:</label>
                                    <input type="text" name="username" class="form-control" id="recipient-name" required="" placeholder="username">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">password:</label>
                                    <input type="password" name="password" class="form-control" required="" placeholder="password">
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
        <?php } else { ?>
            <i class="fa fa-user text-white"> </i> สวัสดีคุณ <?= $datathisuser['name'] ?>
            <a href="logout.php" class="btn btn-danger"><i class="fa fa-sign-out-alt text-white"></i></a>
        <?php } ?>

        </form>
    </div>

</nav>