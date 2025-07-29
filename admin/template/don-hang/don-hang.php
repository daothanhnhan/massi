<?php

if (isset($_GET['search']) && !empty($_GET['search']))
{
    $rows = $action->getSearchAdmin('cart', array(
            'name_buyer', 'mail_buyer', 'phone_buyer', 'address_buyer', 'note_buyer'
    ), $_GET['search'], $trang, 20, $_GET['page']);
    // $rows = $rows['data'];
}
else
{
    // $rows = $order->getListOrder();
     if (isset($_GET['trang'])) {
        $trang = $_GET['trang'];
        $start = $trang -1;
        $start = $start*20;
    } else {
        $trang = 1;
        $start = 0;
    }
    // $rows = $order->getListOrder();
    $sql = "SELECT * From cart Order By id_cart DESC Limit $start,20";
    $result = mysqli_query($conn_vn, $sql);
    $rows1 = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $rows1[] = $row;
    }
    $rows = array('data' => $rows1);
}
?>

<div class="boxPageNews">
    <div class="searchBox">
        <form>
            <input type="hidden" name="page" value="don-hang">
            <button class="btnSearchBox">Tìm kiếm</button>
            <input type="search" class="txtSearchBox" name="search" placeholder="Nhập tự khóa …" />
        </form>
    </div>
    <div class="titleNP">
        <p class="colNP0"><input type="checkbox" name="" value=""></p>
        <p class="colNP1">Đơn hàng</p>
        <p class="colNP2">Ngày đặt</p>
        <p class="colNP3">Khách hàng</p>
        <p class="colNP4">Số điện thoại</p>
        <p class="colNP6">Tổng tiền</p>
    </div>
    <ul class="titleNP">
        <?php foreach($rows['data'] as $rowOrder) :?>
            <li>
                <p class="colNP0_2"><input type="checkbox" name="ckAction" id="ckAction" value=""></p>
                <div class="colNP1_2">
                    <a href="index.php?page=sua-don-hang&id_cart=<?php echo $rowOrder['id_cart']; ?>" title="">#<?php echo $rowOrder['id_cart']; ?></a>
                </div>
                <p class="colNP2_2"><?php echo $rowOrder['date_cart']; ?></p>
                <p class="colNP3_2"><?php echo $rowOrder['name_buyer'];?></p>
                <p class="colNP4_2"><?php echo $rowOrder['phone_buyer'];?></p>
                <p class="colNP6_2"><?php echo number_format($rowOrder['total_price'],"0","",".");?>đ</p>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php  

if (isset($_GET['search']) && !empty($_GET['search'])) {
    echo '<div>'.$rows["paging"].'</div>';

    } else {
        if (isset($_GET['trang'])) {
                $trang = $_GET['trang'];
            } else {
                $trang = 1;
            }

            $sql_pagin = "SELECT * From cart";
            $result_pagin = mysqli_query($conn_vn, $sql_pagin);
            $num_pagin = mysqli_num_rows($result_pagin);


            $config = array(
                'current_page'  => $trang, // Trang hiện tại
                'total_record'  => $num_pagin, // Tổng số record
                'total_page'    => 1, // Tổng số trang
                'limit'         => 20,// limit
                'start'         => 0, // start
                'link_full'     => '',// Link full có dạng như sau: domain/com/page/{page}
                'link_first'    => '',// Link trang đầu tiên
                'range'         => 9, // Số button trang bạn muốn hiển thị 
                'min'           => 0, // Tham số min
                'max'           => 0  // tham số max, min và max là 2 tham số private
            );

            $pagination = new Pagination;
            $pagination->init($config);

            echo $pagination->htmlPaging_tuan($_GET['page']);
        }
?>

<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Truyền Thông Và Công Nghệ GoldBridge Việt Nam</p>