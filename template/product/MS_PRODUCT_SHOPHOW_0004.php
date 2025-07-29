<?php 
    $action_product = new action_product(); 
    $slug = isset($_GET['slug']) ? $_GET['slug'] : '';

    $rowLang = $action_product->getProductLangDetail_byUrl($slug,$lang);
    $row = $action_product->getProductDetail_byId($rowLang[$nameColIdProduct_productLanguage],$lang);
    $_SESSION['productcat_id_relate'] = $row[$nameColIdProductCat_product];
    $_SESSION['sidebar'] = 'productDetail';
    $arr_id = $row['productcat_ar'];
    $arr_id = explode(',', $arr_id);
    $productcat_id = (int)$arr_id[0];
    $product_breadcrumb = $action_product->getProductCatLangDetail_byId($productcat_id, $lang);
    $breadcrumb_url = $product_breadcrumb['friendly_url'];
    $breadcrumb_name = $product_breadcrumb['lang_productcat_name'];
    $use_breadcrumb = true;

    $img_sub = json_decode($row['product_sub_img']);
?>
<script type="text/javascript">
   $(document).ready(function(data){  
      $('.btn_addCart').click(function(){  
         // var product_id = $(this).attr("id");
           var product_id = $('#product_id').val();
           var product_name = $('#product_name').val();  
           var product_price = $('#product_price').val();  
           var product_quantity = $('.number_cart').val();  
           var action = "add";
           var size = $('#size').val();
           // alert(size);return false;
           // var a = {a : 'a'};
           if(product_quantity > 0)  
           {                  
                 $.ajax({  
                     url:"/functions/ajax.php?action=add_cart1",  
                     method:"POST",  
                     dataType:"json",  
                     data:{  
                          product_id:product_id,   
                          product_name:product_name,   
                          product_price:product_price,   
                          product_quantity:product_quantity,   
                          product_size:size,
                          action:action  
                     },  
                     success:function(data)  
                     {  
                          // $('#order_table').html(data.order_table);  
                          // $('.badge').text(data.cart_item);  
                          if (confirm('Thêm sản phẩm thành công, bạn có muốn thanh toán luôn không')) {
                              window.location = '/gio-hang';
                          }else{
                              location.reload();
                              // window.location = '/gio-hang';
                          }  
                     },
                     error: function () {
                        alert('loi');
                     }  
                });  

           }  
           else  
           {  
                alert("Please Enter Number of Quantity")  
           }  
      });
   });
 </script>
<link rel="stylesheet" href="/plugin/slickNav/slicknav.css"/>

<link rel="stylesheet" href="/plugin/slick/slick.css"/>

<link rel="stylesheet" href="/plugin/slick/slick-theme.css"/>

<?php include DIR_BREADCRUMBS."MS_BREADCRUMS_SHOPHOW_0001.php";?>

<div class="gb-chitiet_sanpham_shophow">

    <div class="gb-chitiet_sanpham_shophow-body">

        <div class="container">

            <div class="gb-chitiet_sanpham_shophow-left">



                <!--chi titest sản phẩm-->

                <div class="row">

                    <div class="col-md-6">

                        <div class="gb-chitiet_sanpham_shophow_left-img">

                            <div class="uni-single-car-gallery-images">

                                <div class="slider slider-for">

                                    <div class="slide-item"><img src="/images/<?= $row['product_img'] ?>" alt="" class="img-responsive img1" data-zoom-image="/images/<?= $row['product_img'] ?>"></div>
                                    <?php 
                                      $d = 1;
                                      foreach ($img_sub as $item) {
                                          $d++;
                                          $image = json_decode($item, true);?>
                                    <div class="slide-item"><img src="/images/<?= $image['image'] ?>" alt="" class="img-responsive img<?= $d ?>" data-zoom-image="/images/<?= $image['image'] ?>"></div>
                                    <?php } ?>

                                </div>

                                <div class="slider slider-nav">

                                    <div class="slide-item-nav"><img src="/images/<?= $row['product_img'] ?>" alt="1" class="img-responsive" data-zoom-image="/images/<?= $row['product_img'] ?>"></div>
                                    <?php
                                    $d = 1; 
                                    foreach ($img_sub as $item) {
                                        $d++;
                                        $image = json_decode($item, true);?>
                                    <div class="slide-item-nav"><img src="/images/<?= $image['image'] ?>" alt="<?= $d ?>" class="img-responsive" data-zoom-image="/images/<?= $image['image'] ?>"></div>
                                    <?php } ?>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="gb-chitiet_sanpham_shophow_left-info">

                            <h1 class="product_title entry-title"><?= $rowLang['lang_product_name'] ?></h1>

                            <!-- .description -->

                            <div class="description">

                                <p>

                                    <?= $rowLang['lang_product_des'] ?>
                                </p>

                            </div>

                            <!--ENTRY PRICE-->

                            <?php include DIR_PRODUCT."MS_PRODUCT_SHOPHOW_0002.php";?>

                            <div class="gb-divider"></div>

                            <!-- <div class="gb-luuy-shophow">

                                <h4>Lưu ý</h4>

                                <p>Chúng tôi không bán hàng trực tuyến, trang web chỉ mang tính chất giới thiệu sản phẩm. Quý khách mua hàng xin liên hệ với chúng tôi</p>

                                <a href="tel:0967200588">Hotline: 0967 2005 88</a>

                            </div> -->
                            <?php include DIR_CART."MS_CART_RUOUVANG_0002.php";?>

                            <div class="gb-divider"></div>

                            <!--SHARE-->

                            <?php include DIR_SOCIAL."MS_SOCIAL_SHOPHOW_0002.php";?>



                        </div>

                    </div>

                </div>



                <!--THÔNG SỐ VÀ MÔ TẢ-->

                <div class="gb-thongso-mota">

                    <div class="uni-shortcode-tabs-default">

                        <div class="uni-shortcode-tab-3">

                            <div class="tabbable-panel">

                                <div class="tabbable-line">

                                    <ul class="nav nav-tabs ">

                                        <li  class="active">

                                            <a href="#tab_default_32" data-toggle="tab">

                                                Mô tả sản phẩm</a>

                                        </li>
                                    </ul>

                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tab_default_32">

                                           <?= $rowLang['lang_product_content'] ?>

                                        </div>

                                        <!-- <div class="tab-pane" id="tab_default_33">

                                            <p>Comes Beautifully Gift Boxed as shown. Delivered from the UK.</p>

                                        </div> -->

                                        <div class="tab-pane" id="tab_default_34">

                                            <!--                                            <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="100%" data-numposts="1"></div>-->

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>



                <!--realte product-->

                <?php include DIR_PRODUCT."MS_PRODUCT_SHOPHOW_0005.php";?>



            </div>

        </div>

    </div>

</div>



<script src="/plugin/slick/scripts.js"></script>

<script src="/plugin/slick/slick.js"></script>

<script src="/plugin/slickNav/jquery.slicknav.js"></script>



<div id="fb-root"></div>

<script>(function(d, s, id) {

        var js, fjs = d.getElementsByTagName(s)[0];

        if (d.getElementById(id)) return;

        js = d.createElement(s); js.id = id;

        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";

        fjs.parentNode.insertBefore(js, fjs);

    }(document, 'script', 'facebook-jssdk'));</script>



<script type="text/javascript">

    $(document).ready(function() {

        $('.slider-for').slick({

            slidesToShow: 1,

            slidesToScroll: 1,

            speed: 500,

            arrows: false,

            fade: true,

            asNavFor: '.slider-nav'

        });

        $('.slider-nav').slick({

            slidesToShow: 4,

            slidesToScroll: 1,

            speed: 500,

            asNavFor: '.slider-for',

            dots: false,

            focusOnSelect: true,

            slide: 'div'

        });

    });

</script>