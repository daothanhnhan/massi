<?php
    if (isset($_GET['search']) && $_GET['search'] != '') {
        // $rows = $action->getSearchAdmin('newscat',array('newscat_name','newscat_des','newscat_content','newscat_sub_info1','newscat_sub_info2','newscat_sub_info3','newscat_sub_info4','newscat_sub_info5'), $_GET['search'],$trang,20,$_GET['page']);
        $rows = $action->getSearchAdmin('newscat',array('newscat_name'), $_GET['search'],'','',$_GET['page']);
        // $rows = $rows['data'];
    }else{
	   $rows = $action->getList('newscat','','','newscat_id','desc','','','danh-muc-tin-tuc');
       // $rows = array('data' => $rows1);
        //$rows = $showCategoriesTable
    }
    // echo '<pre>';
    // var_dump($rows);
?>
	<div class="boxPageContent">
    	<div class="searchBox">
    		<form action="">
    			<input type="hidden" name="page" value="danh-muc-tin-tuc">
	        	<button type="submit" class="btnSearchBox" >Tìm kiếm</button>
	            <input type="text" class="txtSearchBox" name="search" />                	                
    		</form>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Người tạo</th>
                    <!-- <th>Ngày cập nhật</th> -->
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php $action->showCategoriesTable($rows, 'newscat_parent', 0, 'sua-danh-muc-tin-tuc', 'newscat_id', 'newscat_name', 'state', 0) ?>
               <!--  <?php foreach ($rows['data'] as $row) { ?>                    
                    <th><?php echo $row['newscat_name'];?></th>
                    <th><?php echo $row['newscat_id'];?></th>
                    <th><?php echo $row['state'];?></th>
                <?php } ?> -->
            </tbody>
        </table>
    

        
    </div>
    <p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Truyền Thông Và Công Nghệ GoldBridge Việt Nam</p>