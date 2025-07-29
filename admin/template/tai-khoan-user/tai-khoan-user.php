<?php
    if (isset($_GET['search']) && $_GET['search'] != '') {
        $rows = $action->getSearchAdmin('user',array('nick','first_name','last_name','email'), $_GET['search'],$trang,10,$_GET['page']);
    }else{
       
        $rows = $acc->getList("user","","","","asc",$trang, 10, "tai-khoan-user");
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
                    <th>Email</th>
                    <th>Ngày khởi tạo</th>
                    <!-- <th>Trạng thái</th> -->
                    
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($rows['data'] as $row) {
                    ?>
                        <tr>
                            <td><a href="javascrip:void(0)" title=""><?= $row['user_name']; ?></a></td>
                            <td><?= $row['user_email']?></td>
                            <td>
                               <!--  <?php 
                                    $acc = new action_account("VN");
                                    $rowRole = $acc->getDetail("admin_role","admin_role_id",$row['admin_role']);
                                    echo $rowRole['admin_role_name'];
                                ?> -->
                                <?= date('d-m-Y H:m:s', strtotime($row['time'])); ?>
                            </td>
                            <!-- <td><?= $row['admin_state'] == 1 ? 'Hoạt động' : 'Khóa'?></td> -->
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