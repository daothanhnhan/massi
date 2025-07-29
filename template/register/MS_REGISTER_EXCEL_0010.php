<?php 
    $message = "";
    function doi_pass () {
        global $conn_vn;
        global $message;
        if (isset($_POST['change_pass'])) {
            $pass1 = trim($_POST['pass1']);
            $pass2 = trim($_POST['pass2']);
            $user_id = $_SESSION['user_id_gbvn'];
            if ($pass1 != $pass2) {
                $message = "Mật khẩu không khớp.";
            } else {
                $pass = password_hash($pass1, PASSWORD_DEFAULT);
                $sql = "UPDATE user SET user_password = '$pass' WHERE user_id = $user_id";
                $result = mysqli_query($conn_vn, $sql);
                echo '<script>alert(\'Bạn đã đổi mật khẩu thành công.\');</script>';
            }
        }
    }
    doi_pass();
?>

<div class="container">
    <?php include DIR_BREADCRUMBS."MS_BREADCRUMS_EXCEL_0001.php";?>
    <div class="row">
        <div class="col-md-3">
            <?php include DIR_REGISTER."MS_REGISTER_EXCEL_0006.php";?>
        </div>
        <div class="col-md-9">
            <h1 class="title-khoahoc"><i class="fa fa-bookmark" aria-hidden="true"></i> Đổi mật khẩu</h1>
            <p style="color: red;"><?= $message ?></p>
            <form action="" method="post">
                <div class="form-group">
                    <label>Nhập mật khẩu:</label>
                    <input type="password" class="form-control" name="pass1" placeholder="Mật khẩu" required>
                </div>
                <div class="form-group">
                    <label>Xác nhận mật khẩu:</label>
                    <input type="password" class="form-control" name="pass2" placeholder="Nhập lại mật khẩu" required>
                </div>
                
                <div class="form-group">
                    <button type="submit" name="change_pass" class="btn btn-success">Cập nhật</button>
                    <!-- <a href="/thong-tin-ca-nhan" class="btn btn-danger" role="button">Hủy</a> -->
                </div>
            </form>
        </div>
    </div>
</div>                            