<?php                                                                        
    if (isset($_GET['slug']) && $_GET['slug'] != '') {
        $slug = $_GET['slug'];

        $rowCatLang = $action_product->getProductCatLangDetail_byUrl($slug,$lang);
        $rowCat = $action_product->getProductCatDetail_byId($rowCatLang['productcat_id'],$lang);
        $rows = $action_product->getProductList_byMultiLevel_orderProductId_new($rowCat['productcat_id'],'desc',$trang,12,$slug);//var_dump($rows);
    }else{
        $rows = $action->getList('product','','','product_id','desc',$trang,12,'san-pham');
    }
    
    $_SESSION['sidebar'] = 'productCat';
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
            <div style="text-align: center;"><?= $rows['paging'] ?></div>
        </div>

        <div class="col-md-3">
            <?php include DIR_SIDEBAR."MS_SIDEBAR_SHOPHOW_0001.php";?>
            <?php include DIR_SIDEBAR."MS_SIDEBAR_SHOPHOW_0006.php";?>
            <?php include DIR_SIDEBAR."MS_SIDEBAR_SHOPHOW_0005.php";?>
            <?php include DIR_SIDEBAR."MS_SIDEBAR_SHOPHOW_0004.php";?> 
        </div>
    </div>
</div>
