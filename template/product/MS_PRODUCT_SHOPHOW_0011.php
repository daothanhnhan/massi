<?php 
    $limit = 12;
    $trang = $_GET['trang'];

    if (isset($_POST['price'])) {
        $price = explode('-', $_POST['price']);
        $price_start = str_replace('đ','', trim($price[0]));
        $price_end = str_replace('đ','', trim($price[1]));
        $str = $price_start . '-' . $price_end;
    } else {
        $price = $_GET['search'];
        $price = explode('-', $price);
        $price_start = $price[0];
        $price_end = $price[1];
        $str = $price_start . '-' . $price_end;
    }
?>
<?php 
    function price ($lang, $start, $end, $trang, $limit) {
        global $conn_vn;
        $sql = "SELECT * FROM product_languages INNER JOIN product ON product_languages.product_id = product.product_id Where product_languages.languages_code = '$lang' And product.product_price BETWEEN $start AND $end";//echo $sql;
        $result = mysqli_query($conn_vn, $sql);
        $count = mysqli_num_rows($result);

        $pos = ($trang) * $limit;
        $sql = "SELECT * FROM product_languages INNER JOIN product ON product_languages.product_id = product.product_id Where product_languages.languages_code = '$lang' And product.product_price BETWEEN $start AND $end LIMIT $pos,$limit";
        $result = mysqli_query($conn_vn, $sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        $return = array(
                'data' => $rows,
                'count' => $count
            );
        return $return;
    }

    $rows = price($lang, $price_start, $price_end, $trang, $limit);
?>
<style type="text/css">

.new-price{

     font-size: 14px;

}

.price{

    text-align: center;

}

</style>

<?php include DIR_BREADCRUMBS."MS_BREADCRUMS_SHOPHOW_0001.php";?>

<div class="gb-page-sanpham_shophow">

    <div class="container">
        <div class="row">
            <div class="col-md-9">

            <?php //include DIR_SEARCH."MS_SEARCH_SHOPHOW_0001.php";?>

            <div class="row">
                <?php 
                $d = 0;
                foreach ($rows['data'] as $item) {
                    $d++;
                    $row = $item;
                    $rowLang = $action_product->getProductLangDetail_byId($row['product_id'],$lang);
                ?>
                <div class="col-sm-4">

                    <div class="gb-product_shophow-item">

                        <div class="gb-product_shophow-item-img">

                            <a href="/<?= $rowLang['friendly_url'] ?>"><img src="/images/<?= $row['product_img'] ?>" alt="<?= $rowLang['lang_product_name'] ?>" class="img-responsive"></a>

                        </div>

                        <div class="gb-product_shophow-item-text">

                            <h2><a href="/<?= $rowLang['friendly_url'] ?>"> <?= $rowLang['lang_product_name'] ?></a></h2>

                            <!--PRICE-->

                            <?php include DIR_PRODUCT."MS_PRODUCT_SHOPHOW_0002.php";?>

                        </div>

                    </div>

                </div>
                <?php
                    if ($d%3==0) {
                        echo '<hr style="width:100%;border:0;" />';
                    }
                }
                ?>
                

            </div>
            <div style="text-align: center;"><?php 
                            $config = array(
                                'current_page'  => $trang+1, // Trang hiện tại
                                'total_record'  => $rows['count'], // Tổng số record
                                'total_page'    => 1, // Tổng số trang
                                'limit'         => $limit,// limit
                                'start'         => 0, // start
                                'link_full'     => '',// Link full có dạng như sau: domain/com/page/{page}
                                'link_first'    => '',// Link trang đầu tiên
                                'range'         => 9, // Số button trang bạn muốn hiển thị 
                                'min'           => 0, // Tham số min
                                'max'           => 0,  // tham số max, min và max là 2 tham số private
                                'search'        => $str

                            );

                            $pagination = new Pagination;
                            $pagination->init($config);
                            echo $pagination->htmlPaging4();
                        ?></div>
        </div>

        <div class="col-md-3">

            <?php include DIR_SIDEBAR."MS_SIDEBAR_SHOPHOW_0001.php";?>
            <?php include DIR_SIDEBAR."MS_SIDEBAR_SHOPHOW_0006.php";?>
            <?php include DIR_SIDEBAR."MS_SIDEBAR_SHOPHOW_0005.php";?>
            <?php include DIR_SIDEBAR."MS_SIDEBAR_SHOPHOW_0004.php";?>       
        </div>
        </div>
    </div>

</div>
