<?php 
    $home_pro_new = $action_product->getListProductNew_hasLimit(8);
?>
<link rel="stylesheet" href="/plugin/owl-carouse/owl.carousel.min.css">
<link rel="stylesheet" href="/plugin/owl-carouse/owl.theme.default.min.css">
<div class="gb-tieubieu-product_shophow">
    <div class="container">
        <div class="gb-tieubieu-product_shophow-title">
            <h5 style="font-size: 20px;"><strong>SẢN PHẨM MỚI </strong> </h5>
            <p align="center" class="sale-chil1" ><a href="/san-pham-moi"> Xem Thêm </a></p>
        </div>
        <div class="gb-tieubieu-product_shophow-body">
            <div class="gb-tieubieu-product_shophow-slide owl-carousel owl-theme">
                <?php 
                foreach ($home_pro_new as $item) {
                    $row = $item;
                    $rowLang = $action_product->getProductLangDetail_byId($row['product_id'],$lang); 
                ?>
                <div class="item">
                    <div class="gb-product_shophow-item">
                        <div class="gb-product_shophow-item-img">
                            <a href="/<?= $rowLang['friendly_url'] ?>"><img id="fixreponsive" src="/images/<?= $row['product_img'] ?>" alt="<?= $rowLang['lang_product_name'] ?>" class="img-responsive"></a>
                        </div>
                        <div class="gb-product_shophow-item-text">
                            <h3><a href="/<?= $rowLang['friendly_url'] ?>"><?= $rowLang['lang_product_name'] ?></a></h3>
                            <?php include DIR_PRODUCT."MS_PRODUCT_SHOPHOW_0002.php";?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script src="/plugin/owl-carouse/owl.carousel.min.js"></script>
<script>
    $(document).ready(function (){
        $('.gb-tieubieu-product_shophow-slide').owlCarousel({
            loop:true,
            margin:30,
            navSpeed:500,
            nav:true,
            dots: false,
            autoplay: true,
            rewind: true,
            navText:[],
            responsive:{
                0:{
                    items:1,
                    nav: true
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