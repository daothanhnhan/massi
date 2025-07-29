<?php
include_once("../functions/library.php");
/**
* 
*/
class action_account extends library{

    public function login(){
        global $conn_vn;
        $txtUser = isset($_POST['accountLogin']) ? $_POST['accountLogin'] : "";
        $txtPass = isset($_POST['passwordLogin']) ? $_POST['passwordLogin'] : "";
        $remember = isset($_POST['remember']) ? $_POST['remember'] : "";
        $sql = "SELECT admin_id, admin_name, admin_password, admin_role, admin_state From admin where admin_login = ? limit 1";
        $stmt = $conn_vn->prepare($sql);
        $stmt->bind_param("s", $txtUser);
        $stmt->execute();
        $stmt->bind_result($admin_id, $admin_name, $admin_password, $admin_role, $admin_state);
        $stmt->store_result();
        if ($stmt->num_rows() == 1) {
            if ($stmt->fetch()) {
                if (password_verify($txtPass, $admin_password)) {
                    if ($state == '2') {
                        echo json_encode(array('error'=>'Tài khoản bị khóa'));
                    }else{
                        $_SESSION['admin_id'] = $admin_id;
                        $_SESSION['admin_name'] = $admin_name;
                        $_SESSION['admin_role'] = $admin_role;
                        $_SESSION['admin_password'] = $admin_password;
                        if ($remember == "1" || $remember =="on") {
                            setcookie('admin_id', $admin_id, time() + (3600 * 24 * 30));
                            setcookie('admin_name', $admin_name, time() + (3600 * 24 * 30));
                            setcookie('admin_role', $admin_role, time() + (3600 * 24 * 30));
                            setcookie('admin_password', $admin_password, time() + (3600 * 24 * 30));
                        }
                        echo json_encode(array('success'=>'Chúc mừng bạn đăng nhập thành công.', 'url'=>'index.php'));
                    }
                }else{
                    echo json_encode(array('error'=>'Sai tên đăng nhập hoặc mật khẩu'));
                }
            }
        }else{
            echo json_encode(array('error'=>'Sai tên đăng nhập hoặc mật khẩu'));
        }
    }

    

    public function checkAdmin(){
        $infor = $this->getLoginInfor();
        if ($infor['admin_role'] == 1) {
            return true;
        }
    }

    public function checkMod(){
        $infor = $this->getLoginInfor();
        if ($infor['admin_role'] == 2) {
            return true;
        }
    }    

    public function logout(){
        if ((isset($_SESSION['admin_id']) && $_SESSION['admin_id'] != "") || (isset($_COOKIE['admin_id']) && $_COOKIE['admin_id'] != "") ) {
            $_SESSION['admin_id'] = "";
            $_SESSION['admin_name'] = "";
            $_SESSION['admin_password'] = "";
            //$_SESSION['state'] = "";
            unset($_SESSION['admin_id']);
            unset($_SESSION['admin_name']);
            unset($_SESSION['admin_password']);
            unset($_SESSION['admin_state']);
            setcookie('admin_id', '', time() - (3600 * 24 * 30));
            setcookie('admin_name', '', time() - (3600 * 24 * 30));
            setcookie('admin_password', '', time() - (3600 * 24 * 30));
            setcookie('admin_state', '', time() - (3600 * 24 * 30));
        }
    }

    public function isLoginAdmin(){
        global $conn_vn;
        if (isset($_SESSION['admin_id']) && $_SESSION['admin_id'] != ""){
            $admin_id = $_SESSION['admin_id'];
        }else if(isset($_COOKIE['admin_id']) && $_COOKIE['admin_id'] != ""){
            $admin_id = $_COOKIE['admin_id'];
        }else{
            $admin_id = 0;
        }
        $sql = "SELECT admin_state from admin where admin_id = '".$admin_id."' limit 1";
        $result = mysqli_query($conn_vn, $sql);
        if (mysqli_num_rows($result) == 1) {
            return true;
        }
    }


    public function redirect($url){
        header("location:$url");
    }

    public function check_change_pass($admin_id, $pass){
        global $conn_vn;
        $sql = "SELECT admin_password from admin where admin_id = '".$admin_id."'";
        $result = mysqli_query($conn_vn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($pass == $row['admin_password']) {
                return true;
            }
        }
    }

    public function updatePass($pass, $id){
        global $conn_vn;
        $sql = 'UPDATE admin set admin_password = ? where admin_id = ?';
        $stmt = $conn_vn->prepare($sql);
        $stmt->bind_param('si',$pass,$id);
        $stmt->execute();
    }

    public function updateAccount(){
        global $conn_vn;
        $admin_id = isset($_POST['admin_id']) ? $_POST['admin_id'] : "";
        $admin_name = isset($_POST['admin_name']) ? $_POST['admin_name'] : "";
        $admin_password = isset($_POST['admin_password']) ? $_POST['admin_password'] : "";
        $admin_phone = isset($_POST['admin_phone']) ? $_POST['admin_phone'] : "";
        $admin_email = isset($_POST['admin_email']) ? $_POST['admin_email'] : "";
    
        $admin_note = isset($_POST['admin_note']) ? $_POST['admin_note'] : "";
        $admin_role = isset($_POST['admin_role']) ? $_POST['admin_role'] : "";
        $admin_state = isset($_POST['admin_state']) ? $_POST['admin_state'] : "";
        if (!$this->check_change_pass($admin_id, $admin_password)) {
            $admin_password = password_hash($admin_password, PASSWORD_DEFAULT);
            $this->updatePass($admin_password,$admin_id);
        }

        $sql = "UPDATE admin set admin_name = ?, admin_phone = ?, admin_email = ?, admin_note = ?, admin_role = ?, admin_state = ? where admin_id = ?";
        $stmt = $conn_vn->prepare($sql);
        $stmt->bind_param("ssssiii", $admin_name, $admin_phone, $admin_email, $admin_note, $admin_role, $admin_state, $admin_id);
        $stmt->execute();
        if ($conn_vn->affected_rows > 0) {
            echo json_encode(array("success"=>"Cập nhật thông tin thành công"));
        }else{
            echo json_encode(array("error"=>"Lỗi hoặc chưa cập nhật thông tin, mời thử lại"));
        }
    }

    public function addAccount(){
        global $conn_vn;
        $admin_name = isset($_POST['admin_name']) ? $_POST['admin_name'] : "";
        $admin_login = isset($_POST['admin_login']) ? $_POST['admin_login'] : "";
        $admin_password = isset($_POST['admin_password']) ? $_POST['admin_password'] : "";
        $admin_phone = isset($_POST['admin_phone']) ? $_POST['admin_phone'] : "";
        $admin_email = isset($_POST['admin_email']) ? $_POST['admin_email'] : "";
        $admin_note = isset($_POST['admin_note']) ? $_POST['admin_note'] : "";
        $admin_role = isset($_POST['admin_role']) ? $_POST['admin_role'] : "";
        $admin_state = isset($_POST['admin_state']) ? $_POST['admin_state'] : "";

        $checkUser = $this->getDetail('admin','admin_login',$admin_login);
        if ($checkUser != '') {
            echo json_encode(array('error'=>'Lỗi, tên đăng nhập đã tồn tại'));
            exit();
        }

        $admin_password = password_hash($admin_password, PASSWORD_DEFAULT);

        $sql = "INSERT into admin (admin_name, admin_login, admin_password, admin_phone, admin_email, admin_note, admin_role, admin_state) values(?,?,?,?,?,?,?,?)";
        $stmt = $conn_vn->prepare($sql);
        $stmt->bind_param("ssssssii", $admin_name, $admin_login, $admin_password, $admin_phone, $admin_email, $admin_note, $admin_role, $admin_state);
        $stmt->execute();
        if ($conn_vn->affected_rows > 0) {
            $id = $stmt->insert_id;
            echo json_encode(array("success"=>"Thêm mới thành công","url"=>"index.php?page=sua-tai-khoan&id=".$id));
        }else{
            echo json_encode(array("error"=>"Lỗi, mời thử lại"));
            echo $stmt->error;
        } 
    }

    public function deleteAccount(){
        global $conn_vn;
        $admin_id = isset($_POST['id']) ? $_POST['id'] : "";
        $sql = "DELETE from admin where admin_id = ?";
        $stmt = $conn_vn->prepare($sql);
        $stmt->bind_param("i",$admin_id);
        $stmt->execute();
        if ($conn_vn->affected_rows > 0) {
            echo json_encode(array("success"=>"Xóa thành công","url"=>"index.php?page=tai-khoan"));
        }else{
            echo json_encode(array("error"=>"Lỗi, mời thử lại"));
        }
    }

    
}
?>