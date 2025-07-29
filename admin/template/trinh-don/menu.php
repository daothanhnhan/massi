<?php
    if (isset($_GET['search']) && $_GET['search'] != '') {
        $rows = $action->getSearchAdmin('menu',array('menu_name'), $_GET['search'],$trang,20,$_GET['page']);
        $rows = $rows['data'];
    }else{
       $rows = $action->getList('menu','','','menu_sort_order','asc','','','sua-trinh-don');
        //$rows = $showCategoriesTable
    }
?>
    <div class="boxPageContent">
        <div class="searchBox">
            <form action="">
                <input type="hidden" name="page" value="trinh-don">
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
                <?php $action->showCategoriesTable($rows, 'menu_parent', 0, 'sua-trinh-don', 'menu_id', 'menu_name', 'state', 0) ?>
            </tbody>
        </table>

        <div class="paging"><?= $rows['paging']?></div>
    </div>
    <p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Truyền Thông Và Công Nghệ GoldBridge Việt Nam</p>