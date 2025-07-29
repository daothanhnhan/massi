<?php
    if (isset($_GET['search']) && $_GET['search'] != '') {
        $rows = $action->getSearchAdmin('admin',array('admin_name','admin_login','admin_email','admin_phone','admin_note'), $_GET['search'],$trang,10,$_GET['page']);
    }else{
        if ($acc->checkMod()) {
            $acc->redirect("index.php?page=sua-tai-khoan&id=".$action->getLoginInfor()['admin_id']);
        }
       
        $rows = $acc->getList("admin","","","admin_role","asc",$trang, 10, "tai-khoan");
    }
    
        


?>	
    <div class="boxPageNews">
    	<div class="searchBox">
            <form action="">
                <input type="hidden" name="page" value="tai-khoan">
            	<button type="submit" class="btnSearchBox" name="">Tìm kiếm</button>
                <input type="text" class="txtSearchBox" name="search" />                	                
            </form>
        </div>
        
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Tên tài khoản</th>
                    <th>Tên đăng nhập</th>
                    <th>Quyền</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($rows['data'] as $row) {
                    ?>
                        <tr>
                            <td><a href="index.php?page=sua-tai-khoan&id=<?= $row['admin_id']; ?>" title=""><?= $row['admin_name']; ?></a></td>
                            <td><?= $row['admin_login']?></td>
                            <td>
                                <?php 
                                    $acc = new action_account("VN");
                                    $rowRole = $acc->getDetail("admin_role","admin_role_id",$row['admin_role']);
                                    echo $rowRole['admin_role_name'];
                                ?>
                            </td>
                            <td><?= $row['admin_state'] == 1 ? 'Hoạt động' : 'Khóa'?></td>
                        </tr>
                    <?php
                    }
                ?>
            </tbody>
        </table>
    	
        <div class="paging">             
        	<?= $rows['paging'] ?>
		</div>
    </div>
    <p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Truyền Thông Và Công Nghệ GoldBridge Việt Nam</p>             