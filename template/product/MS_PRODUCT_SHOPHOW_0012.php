<?php                                                                        
    $home_banchay = $action_product->getListProductHot_hasLimit(8);
?>
<style type="text/css">

.new-price{

     font-size: 14px;

}

.price{

    text-align: center;
    color: black;
}

</style>

<div class="gb-page-sanpham_shophow">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="gb-tieubieu-product_shophow-title">
                    <h5 style="font-size: 20px;text-align: center;margin-bottom: 30px;"><strong>SẢN BÁN CHẠY </strong> </h5>
                    <!-- <p align="center" class="sale-chil1" ><a href="/san-pham-moi"> Xem Thêm </a></p> -->
                </div>
            <div class="row">
                <?php 
                $d = 0;
                foreach ($home_banchay as $item) {
                    $d++;
                    $row = $item;
                    $rowLang = $action_product->getProductLangDetail_byId($row['product_id'],$lang);
                ?>
                <div class="col-sm-3">

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
                    if ($d%4==0) {
                        echo '<hr style="width:100%;border:0;" />';
                    }
                }
                ?>
            </div>
            <div class="gb-btn-xemtatca"><a href="/san-pham-ban-chay">Xem tất cả</a></div>
        </div>
        </div>
    </div>
</div>
