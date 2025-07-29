<?php     
    $regInfor_id = isset($_GET['id']) ? $_GET['id'] : '';
    $row1 = $action->getDetail("regInfor", "regInfor_id", $regInfor_id);
    if ($row1 == "") {
        header("location:index.php?page=dang-ky");
    }
?>

<form action="" method="post" id="updateAccount">
    <input type="hidden" name="admin_id" value="<?= $admin_id?>">
    <input type="hidden" name="action" value="updateAccount">

    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Thông tin khách hàng tham gian trắc nghiệm</span>
            <!-- <p class="subLeftNCP">Nhập tiêu đề và nội dung cho trang<br /><br /></p>     
            <p class="subLeftNCP">Chọn ảnh đại diện. Tỉ lệ hình ảnh yêu cầu là 4x3.</p>  -->                    
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Họ Tên Khách hàng</p>
            <input type="text" class="txtNCP1" value="<?= $row1['regInfor_name']?>" name="regInfor_name" required/>
            <p class="titleRightNCP">Năm sinh</p>
            <input type="text" class="txtNCP1" value="<?= $row1['regInfor_wasBorn']?>" name="regInfor_wasBorn" readonly/>
            <p class="titleRightNCP">Giới tính</p>
            <input class="txtNCP1" value="<?= $row1['regInfor_sex']?>" name="regInfor_sex" required/>
            <p class="titleRightNCP">Số điện thoại</p>
            <input type="text" class="txtNCP1" value="<?= $row1['regInfor_phone']?>" name="regInfor_phone"/>
            <p class="titleRightNCP">Ngày đăng ký</p>
            <input type="text" class="txtNCP1" value="<?= $row1['regInfor_createdDate']?>" name="regInfor_createdDate"/>           
        </div>
    </div><!--end rowNodeContentPage-->

    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Thông tin trắc nghiệm</span>
            <!-- <p class="subLeftNCP">Thiết lập chế độ hiển thị cho trang nội dung</p>   -->              
        </div>
        <div class="boxNodeContentPage">            
           <!-- câu hỏi 1 -->                               
            <div class="mainForm">
                <p class="contentQuestion">Câu 1: Búi trĩ của bạn có những  triệu chứng gì sau đây?</p>
                <?php 
                    $rows = $action->getList('optionsQ1','','','optionsQ1_id','asc','','','');
                    $i = 0;
                    foreach ($rows as $key => $row) {
                    $i++;
                ?>
                    <div class="rowQuestion">
                        <label class="selectQ"><?= $row['optionsQ1_value']?></label>
                        <input class="cbQ" name="optionsQ1_id" type="radio" value=<?= $row['optionsQ1_id']?> <?php echo $row['optionsQ1_id'] == $row1['regInfor_answer1'] ? "checked" : ""; ?>/>
                    </div>   
                <?php
                    }
                ?> 
            </div>

            <!-- câu hỏi 2 -->
            <div class="mainForm">
                <p class="contentQuestion">Câu 2: Bạn có bị táo bón hay không?</p>
                <?php 
                    $rows = $action->getList('optionsQ2','','','optionsQ2_id','asc','','','');
                    $i = 0;
                    foreach ($rows as $key => $row) {
                    $i++;
                ?>
                    <div class="rowQuestion">
                        <label class="selectQ"><?= $row['optionsQ2_value']?></label>
                        <input class="cbQ" name="optionsQ2_id" type="radio" value=<?= $row['optionsQ2_id']?> <?php echo $row['optionsQ2_id'] == $row1['regInfor_answer2'] ? "checked" : ""; ?>/>
                    </div>   
                <?php
                    }
                ?> 
            </div>

            <!-- câu hỏi 3 -->
            <div class="mainForm">
                <p class="contentQuestion">Câu 3: Bạn bị lâu chưa?</p>
                <?php 
                    $rows = $action->getList('optionsQ3','','','optionsQ3_id','asc','','','');
                    $i = 0;
                    foreach ($rows as $key => $row) {
                    $i++;
                ?>
                    <div class="rowQuestion">
                        <label class="selectQ"><?= $row['optionsQ3_value']?></label>
                        <input class="cbQ" name="optionsQ3_id" type="radio" value=<?= $row['optionsQ3_id']?> <?php echo $row['optionsQ3_id'] == $row1['regInfor_answer3'] ? "checked" : ""; ?>/>
                    </div>   
                <?php
                    }
                ?>
            </div>

            <!-- câu hỏi 4 -->
            <div class="mainForm">
                <p class="contentQuestion">Câu 4: Mức độ chảy máu như thế nào?</p>
                <?php 
                    $rows = $action->getList('optionsQ4','','','optionsQ4_id','asc','','','');
                    $i = 0;
                    foreach ($rows as $key => $row) {
                    $i++;
                ?>
                    <div class="rowQuestion">
                        <label class="selectQ"><?= $row['optionsQ4_value']?></label>
                        <input class="cbQ" name="optionsQ4_id" type="radio" value=<?= $row['optionsQ4_id']?> <?php echo $row['optionsQ4_id'] == $row1['regInfor_answer4'] ? "checked" : ""; ?>/>
                    </div>   
                <?php
                    }
                ?>
            </div>

            <!-- câu hỏi 5 -->
            <div class="mainForm">
                <p class="contentQuestion">Câu 5: Mức độ đau rát như thế nào?</p>
                <?php 
                    $rows = $action->getList('optionsQ5','','','optionsQ5_id','asc','','','');
                    $i = 0;
                    foreach ($rows as $key => $row) {
                    $i++;
                ?>
                    <div class="rowQuestion">
                        <label class="selectQ"><?= $row['optionsQ5_value']?></label>
                        <input class="cbQ" name="optionsQ5_id" type="radio" value=<?= $row['optionsQ5_id']?> <?php echo $row['optionsQ5_id'] == $row1['regInfor_answer5'] ? "checked" : ""; ?>/>
                    </div>   
                <?php
                    }
                ?>
            </div>

            <!-- câu hỏi 6 -->
            <div class="mainForm">
                <p class="contentQuestion">Câu 6: Búi tri sa ra ngoài nhiều không?</p>
                <?php 
                    $rows = $action->getList('optionsQ6','','','optionsQ6_id','asc','','','');
                    $i = 0;
                    foreach ($rows as $key => $row) {
                    $i++;
                ?>
                    <div class="rowQuestion">
                        <label class="selectQ"><?= $row['optionsQ6_value']?></label>
                        <input class="cbQ" name="optionsQ6_id" type="radio" value=<?= $row['optionsQ6_id']?> <?php echo $row['optionsQ6_id'] == $row1['regInfor_answer6'] ? "checked" : ""; ?>/>
                    </div>   
                <?php
                    }
                ?>
            </div>

            <!-- câu hỏi 7 -->
            <div class="mainForm">
                <p class="contentQuestion">Câu 7: Búi trĩ sa ra có tự co vào được không?</p>
                <?php 
                    $rows = $action->getList('optionsQ7','','','optionsQ7_id','asc','','','');
                    $i = 0;
                    foreach ($rows as $key => $row) {
                    $i++;
                ?>
                    <div class="rowQuestion">
                        <label class="selectQ"><?= $row['optionsQ7_value']?></label>
                        <input class="cbQ" name="optionsQ7_id" type="radio" value=<?= $row['optionsQ7_id']?> <?php echo $row['optionsQ7_id'] == $row1['regInfor_answer7'] ? "checked" : ""; ?>/>
                    </div>   
                <?php
                    }
                ?>
            </div>

            <!-- câu hỏi 8 -->
            <div class="mainForm">
                <p class="contentQuestion">Câu 8: Mức độ ẩm ướt tại hậu môn?</p>
                <?php 
                    $rows = $action->getList('optionsQ8','','','optionsQ8_id','asc','','','');
                    $i = 0;
                    foreach ($rows as $key => $row) {
                    $i++;
                ?>
                    <div class="rowQuestion">
                        <label class="selectQ"><?= $row['optionsQ8_value']?></label>
                        <input class="cbQ" name="optionsQ8_id" type="radio" value=<?= $row['optionsQ8_id']?> <?php echo $row['optionsQ8_id'] == $row1['regInfor_answer8'] ? "checked" : ""; ?>/>
                    </div>   
                <?php
                    }
                ?>
            </div>

            <!-- câu hỏi 9 -->
            <div class="mainForm">
                <p class="contentQuestion">Câu 9: Tính chất nghề nghiệp có phải đứng nhiều hay ngồi liên tục trong ngày ( trên 6h liên tục/ngày)</p>
                <?php 
                    $rows = $action->getList('optionsQ9','','','optionsQ9_id','asc','','','');
                    $i = 0;
                    foreach ($rows as $key => $row) {
                    $i++;
                ?>
                    <div class="rowQuestion">
                        <label class="selectQ"><?= $row['optionsQ9_value']?></label>
                        <input class="cbQ" name="optionsQ9_id" type="radio" value=<?= $row['optionsQ9_id']?> <?php echo $row['optionsQ9_id'] == $row1['regInfor_answer9'] ? "checked" : ""; ?>/>
                    </div>   
                <?php
                    }
                ?>
            </div> 

        </div>
    </div><!--end rowNodeContentPage-->
    <button class="btn btnSave" type="submit" <?php echo ($_SESSION['admin_role']==2)?'style="display: none;"':'';?>>Lưu</button>
    <button class="btn btnDelete" type="button" id="deleteAccount" data-id="<?=$admin_id?>" data-action="deleteAccount" <?php echo ($_SESSION['admin_role']==2)?'style="display: none;"':'';?>>Xóa</button>
</form>
            
            <p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Truyền Thông Và Công Nghệ GoldBridge Việt Nam</p>