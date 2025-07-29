<style type="text/css">

    #fix{

        background: #2d2d2d;

    border-top: 0.5px solid #b1a8a8;

    border-bottom: 0.5px solid #b1a8a8;



    }

    .gb-main-menu_ldpvinhome .cssmenu > ul > li > a{

        font-size: 13px;

        /*margin-left: 20px;*/

    }

    .gb-main-menu_ldpvinhome .cssmenu > ul > li{

        border-right: 0px !important;

    }

</style>

<nav id="fix" class="gb-main-menu_ldpvinhome sticky-menu" >

    <div class="main-navigation uni-menu-text_ldpvinhome">

        <div class="cssmenu">

            <!-- <ul>

                <li><a href="http://somehow.thietkewebsitegbvn.com/" class="slide-section">Trang chủ</a></li>

                <li class="has-sub"><a href="san-pham">Sản Phẩm</a>

                    <ul>

                        <li><a href="san-pham">Sản Phẩm mới</span></a>

                                <li><a href="san-pham">ÁO Khoác</span></a></li>

                                <li><a href="san-pham">ÁO Sơ Mi</span></a></li>

                                <li><a href="san-pham">ÁO Thun</span></a></li>

                                <li><a href="san-pham">ÁO Polo</span></a></li>

                                <li><a href="san-pham">ÁO NỈ</span></a></li>

                                <li><a href="san-pham">ÁO NEN</span></a></li>

                                <li><a href="san-pham">QUẦN JEAM</span></a></li>

                                <li><a href="san-pham">QUẦN KAKI</span></a></li>

                                <li><a href="san-pham">QUẦN ĐÙI</span></a></li>

                                <li><a href="san-pham">JOGGER</span></a></li>

                                <li><a href="san-pham">NÓN MŨ- GIẦY GIÉP</span></a></li>

                        </li>

                    </ul>

                </li>

                <li class="has-sub"><a href="san-pham">Giới Thiệu</a>

                </li>

                <li class="has-sub"><a href="san-pham">Địa chỉ cửa hàng</a>

                </li>

                <li><a href="lien-he">Liên hệ</a></li>

            </ul> -->
            <?php 
                $list_menu = $menu->getListMainMenu_byOrderASC();
                $menu->showMenu_byMultiLevel_mainMenuMassi($list_menu,0,$lang,0);
            ?>
        </div>

    </div>

</nav>



<script src="/plugin/sticky/jquery.sticky.js"></script>

<script>

    $(document).ready(function () {

        var headerHeight = $('.gb-main-menu_ldpvinhome').outerHeight();



        $('.slide-section').click(function () {

            var linkHref = $(this).attr('href');

            $('html, body').animate({

                scrollTop: $(linkHref).offset().top - headerHeight

            }, 1000);

            e.preventDefault();

        });



        $(".sticky-menu").sticky({topSpacing:0});

    });

</script>