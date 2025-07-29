<?php 
    if ($acc->checkMod()) {
        $acc->redirect("index.php");
    }
    $rowsRole = $acc->getList("admin_role","","","admin_role_id","asc",'',"","");
?>

<form action="" method="post" id="addAccount">
    <input type="hidden" name="action" value="addAccount">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung </span>
            <p class="subLeftNCP">Nhập thông tin tài khoản<br /><br /></p>     
                    
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Họ Tên</p>
            <input type="text" class="txtNCP1" value="<?= $rowAcc['admin_name']?>" name="admin_name" required/>
            <p class="titleRightNCP">Tên đăng nhập</p>
            <input type="text" class="txtNCP1" value="<?= $rowAcc['admin_login']?>" name="admin_login" required/>
            <p class="titleRightNCP">Mật khẩu</p>
            <input type="password" class="txtNCP1" value="<?= $rowAcc['admin_password']?>" name="admin_password" required/>
            <p class="titleRightNCP">Số điện thoại</p>
            <input type="text" class="txtNCP1" value="<?= $rowAcc['admin_phone']?>" name="admin_phone"/>
            <p class="titleRightNCP">Email</p>
            <input type="text" class="txtNCP1" value="<?= $rowAcc['admin_email']?>" name="admin_email"/>
           
            <p class="titleRightNCP">Ghi chú</p>
            <textarea class="longtxtNCP2" name="admin_note" ><?= $rowAcc['admin_note']?></textarea>
            <!--<p class="titleRightNCP">Mô tả dài:</p>
            <textarea class="longtxtNCP1" style="height:80px;"  name="longDes">Nội dung mô tả dài</textarea>-->
            <div class="subColContent">
                <p class="titleRightNCP">Phân quyền</p>
                <select class="select2" name="admin_role">
                <?php 
                    foreach ($rowsRole as $key => $value) {
                    ?>
                        <option value="<?= $value['admin_role_id']?>" <?php if($rowAcc['admin_role'] == $value['admin_role_id']){echo "selected";}?> >
                            <?= $value['admin_role_name']?>
                        </option>
                    <?php
                    }
                ?>
                </select>
            </div>
        </div>
    </div><!--end rowNodeContentPage-->
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Trạng thái</span>
            <p class="subLeftNCP">Thiết lập trạng thái</p>                
        </div>
        <div class="boxNodeContentPage">
            <label class="selectCate">
                <input type="checkbox" value="1" name="admin_state" checked>
                Hoạt động
            </label>
        </div>
    </div><!--end rowNodeContentPage-->
    <button class="btn btnSave" type="submit">Lưu</button>
</form>
            
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Truyền Thông Và Công Nghệ GoldBridge Việt Nam</p>