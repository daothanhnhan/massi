<?php 
    $home_pro_sale = $action_product->getListProductSaleOff_hasLimit(8);
    $home_pro_sale_count = count($home_pro_sale);
    if ($home_pro_sale_count > 0) { 
?>
<div id="gb-tieubieu-product_shophow" class="gb-tieubieu-product_shophow">
    <h2 class="sale" align="center"><strong> SALE OFF: UP TO 50% </strong></h2>
    <p align="center" class="sale-chil" ><a href="/sale"> Xem Thêm </a></p>
    <div class="container">
        <div class="gb-tieubieu-product_shophow-title">
        </div>
 <div class="gb-tieubieu-product_shophow-body">
            <div class="gb-tieubieu-product_shophow-slide1 owl-carousel owl-theme">
                <?php 
                foreach ($home_pro_sale as $item) { 
                    $row = $item;
                    $rowLang = $action_product->getProductLangDetail_byId($row['product_id'],$lang);
                ?>
                <div class="item1">
                    <div>
                        <div class="price-img">
                            <a href="/<?= $rowLang['friendly_url'] ?>"><img src="/images/<?= $row['product_img'] ?>" alt="<?= $rowLang['lang_product_name'] ?>" class="img-responsive"></a>
                        </div>
                        <div id="backgr"  class="gb-product_shophow-item-text">
                            <h2><a href="/<?= $rowLang['friendly_url'] ?>"> <?= $rowLang['lang_product_name'] ?></a></h2>
                             <?php include DIR_PRODUCT."MS_PRODUCT_SHOPHOW_0002.php";?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!-- VAN CHUYEN -->
<script src="/plugin/owl-carouse/owl.carousel.min.js"></script>
<script>
    $(document).ready(function (){
        $('.gb-tieubieu-product_shophow-slide1').owlCarousel({
            loop:true,
            margin:30,
            navSpeed:500,
            nav:true,
            dots: false,
            autoplay: false,
            rewind: true,
            navText:[],
            responsive:{
                0:{
                    items:2,
                    nav: false
                },
                600:{
                    items: 3,
                    nav:true
                },
                992:{
                    items: 5,
                    nav:true
                }
            }
        });
    });
</script>