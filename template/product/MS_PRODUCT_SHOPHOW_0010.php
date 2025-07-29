<?php 
    $limit = 12;                                                                           
   function search ($lang, $trang, $limit) {
        if (isset($_POST['q'])) {
            $q = $_POST['q'];
            $q = trim($q);
            $q = vi_en1($q);            
        } else {
            $q = $_GET['search'];
            // $q = str_replace('-', ' ', $q);
        }

        $start = $trang * $limit;
        global $conn_vn;
        $sql = "SELECT * FROM product_languages INNER JOIN product ON product_languages.product_id = product.product_id WHERE product_languages.friendly_url like '%$q%' And product_languages.languages_code = '$lang' ORDER BY product.product_id DESC";
        $result = mysqli_query($conn_vn, $sql);
        $count = mysqli_num_rows($result);

        $sql = "SELECT * FROM product_languages INNER JOIN product ON product_languages.product_id = product.product_id WHERE product_languages.friendly_url like '%$q%' And product_languages.languages_code = '$lang' ORDER BY product.product_id DESC LIMIT $start,$limit";
        $result = mysqli_query($conn_vn, $sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        $return = array(
                'data' => $rows,
                'count' => $count,
                'q' => $q
            );
        return $return;
    }
    $rows = search($lang, $trang, $limit);//var_dump($rows['count']);die;
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

        <div class="col-md-9">

            <?php include DIR_SEARCH."MS_SEARCH_SHOPHOW_0001.php";?>

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
                        'range'         => 5, // Số button trang bạn muốn hiển thị 
                        'min'           => 0, // Tham số min
                        'max'           => 0,  // tham số max, min và max là 2 tham số private
                        'search'        => str_replace(' ', '-', $rows['q'])

                    );

                    $pagination = new Pagination;
                    $pagination->init($config);
                    echo $pagination->htmlPaging1();
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
