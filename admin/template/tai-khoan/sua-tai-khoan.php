<?php 
    
    $admin_id = isset($_GET['id']) ? $_GET['id'] : '';
    if ($acc->checkMod()) {
        $admin_id = $acc->getLoginInfor()['admin_id'];
    }
    $rowAcc = $acc->getDetail("admin", "admin_id", $admin_id);
    $rowsRole = $acc->getList("admin_role","","","admin_role_id","asc",'',"","");
?>

<form action="" method="post" id="updateAccount">
    <input type="hidden" name="admin_id" value="<?= $admin_id?>">
    <input type="hidden" name="action" value="updateAccount">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung trang</span>
            <p class="subLeftNCP">Nhập tiêu đề và nội dung cho trang<br /><br /></p>     
            <p class="subLeftNCP">Chọn ảnh đại diện. Tỉ lệ hình ảnh yêu cầu là 4x3.</p> 
                    
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Họ Tên</p>
            <input type="text" class="txtNCP1" value="<?= $rowAcc['admin_name']?>" name="admin_name" required/>
            <p class="titleRightNCP">Tên đăng nhập</p>
            <input type="text" class="txtNCP1" value="<?= $rowAcc['admin_login']?>" name="admin_login" readonly/>
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
            <p class="subLeftNCP">Thiết lập chế độ hiển thị cho trang nội dung</p>                
        </div>
        <div class="boxNodeContentPage">
            <label class="selectCate">
                <input type="checkbox" value="1" name="admin_state" <?= $rowAcc['admin_state'] == 1 ? 'checked' : ''?>>
                Hoạt động
            </label>
        </div>
    </div><!--end rowNodeContentPage-->
    <button class="btn btnSave" type="submit" <?php echo ($_SESSION['admin_role']==2)?'style="display: none;"':'';?> >Lưu</button>
    <button class="btn btnDelete" type="button" id="deleteAccount" data-id="<?=$admin_id?>" data-action="deleteAccount" <?php echo ($_SESSION['admin_role']==2)?'style="display: none;"':'';?> >Xóa</button>
</form>
            
            <p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Truyền Thông Và Công Nghệ GoldBridge Việt Nam</p>