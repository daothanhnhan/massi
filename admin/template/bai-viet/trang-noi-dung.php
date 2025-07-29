<?php
    if (isset($_GET['search']) && $_GET['search'] != '') {
        $rows = $action->getSearchAdmin('page',array('page_name','page_des','page_content','page_sub_info1','page_sub_info2','page_sub_info3','page_sub_info4','page_sub_info5'), $_GET['search'],$trang,20);
    }else{
	   $rows = $action->getList('page','','','page_id','desc',$trang,20,'bai-viet');
    }

    $title = $translate['title']; 
?>
	<div class="boxPageContent">
    	<div class="searchBox">
    		<form action="">
    			<input type="hidden" name="page" value="bai-viet">
	        	<button type="submit" class="btnSearchBox" name="searchPage">Tìm kiếm</button>
	            <input type="text" class="txtSearchBox" name="txtSearchBox" />                	                
    		</form>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th><?php echo $translate['title'] ?></th>
                    <th>Người tạo</th>
                    <th>Ngày cập nhật</th>
                    <th>Trạng thái</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($rows['data'] as $row) {
                    ?>
                        <tr>
                            <td><a href="index.php?page=sua-bai-viet&id=<?= $row['page_id'];?>" title="<?= $row['page_name'];?>"><?= $row['page_name'];?></a></td>
                            <td>
                                <a href="#" class="rightCP">
                                <?php 
                                    $action1 = new action_page('VN');
                                    echo $action1->getDetail('admin','admin_id',$row['created_id'])['admin_name'];
                                ?>
                                </a> 
                            </td>
                            <td><?= $row['page_update_date'] != '' ? date('d-m-Y H:m:s', strtotime($row['page_update_date'])) : date('d-m-Y H:m:s', strtotime($row['page_created_date']))?></td>
                            <td><?= $row['state'] == 1 ? 'Hiển thị' : 'Không'?></td>
                        </tr>
                    <?php
                    }
                ?>
            </tbody>
        </table>
    	

        <div class="paging"><?= $rows['paging']?></div>
    </div>
    <p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Truyền Thông Và Công Nghệ GoldBridge Việt Nam</p>