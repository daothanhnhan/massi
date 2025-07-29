<?php
    if (isset($_GET['search']) && $_GET['search'] != '') {
        $rows = $action->getSearchAdmin('news',array('news_name'), $_GET['search'],$trang,20,$_GET['page']);
    }else{
       $rows = $action->getList('news','','','news_id','desc',$trang,20,'tin-tuc');
    }
?>
	
    
<div class="boxPageNews">
	<div class="searchBox">
        <form action="">
            <input type="hidden" name="page" value="tin-tuc">
        	<button type="submit" class="btnSearchBox">Tìm kiếm</button>
            <input type="text" class="txtSearchBox" name="search" />                	                
        </form>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Người tạo</th>
                <th>Ngày cập nhật</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($rows['data'] as $key => $row) {
                ?>
                    <tr>
                        <td><a href="index.php?page=sua-tin-tuc&id=<?= $row['news_id']; ?>" title=""><?= $row['news_name']; ?></a></td>
                        <td>
                            <a href="#" class="rightCP">
                            <?php 
                                $action1 = new action_page('VN');
                                echo $action1->getDetail('admin','admin_id',$row['created_id'])['admin_name'];
                            ?>
                            </a>    
                        </td>
                        <td><?= $row['news_update_date'] != '' ? date('d-m-Y H:m:s', strtotime($row['news_update_date'])) : date('d-m-Y H:m:s', strtotime($row['news_created_date']))?></td>
                        <td><?= $row['state'] == 1 ? 'Đã đăng' : 'Chờ duyệt'?></td>
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