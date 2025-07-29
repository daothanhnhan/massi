<?php 
    $sidebar_product_new = $action_product->getListProductNew_hasLimit(4);//var_dump($sidebar_product_new);
?>
<div class="gb-product-sidebar-shophow widget-sidebar">

    <aside class="widget">

        <h3 class="widget-title-sidebar-shophow">Sản phẩm mới nhất</h3>

        <div class="widget-content">

            <div class="gb-newlist-details">
                <?php 
                foreach ($sidebar_product_new as $item) {
                    $row = $item;
                    $rowLang = $action_product->getProductLangDetail_byId($row['product_id'],$lang);
                ?>

                <div class="gb-product-sidebar_shophow-item">

                    <div class="gb-product-sidebar_shophow-item-img">

                        <a href="/<?= $rowLang['friendly_url'] ?>"><img src="/images/<?= $row['product_img'] ?>" alt="review" class="img-responsive"></a>

                    </div>

                    <div class="gb-product-sidebar_shophow-item-info">

                        <h4><a href="/<?= $rowLang['friendly_url'] ?>"><?= $rowLang['lang_product_name'] ?></a></h4>

                        <!--PRICE-->

                        <?php include DIR_PRODUCT."MS_PRODUCT_SHOPHOW_0002.php";?>

                        <div class="clearfix"></div>

                    </div>

                </div>
                <?php } ?>


            </div>

        </div>

    </aside>

</div>