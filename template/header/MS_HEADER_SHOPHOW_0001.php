<!--MENU MOBILE-->

<?php include_once DIR_MENU."MS_MENU_SHOPHOW_0002.php"; ?>

<link rel="stylesheet" type="text/css" href="css/fixresponsive.css">

<!-- End menu mobile-->

<!--MENU DESTOP-->

<header>

    <div class="gb-header-shophow">

        <div class="gb-top-header_shophow" style="background:#2d2d2d; ">

            <div class="container">

                <div class="row">

                    <div class="col-md-2">

                        <div id="styleheader">

                             <a href="/"><img src="/images/<?= $rowConfig['web_logo'] ?>" alt="SomeHow Store"class="img-responsive"></a>

                        </div>

                    </div>

                    <div class="col-md-8">
                        <?php include DIR_CONTACT."MS_CONTACT_SHOPHOW_0002.php";?>
                    </div>

                    <div class="col-md-2 hiden-xs hidden-xs hidden-sm">

                        <div class="gb-top-header_shophow-right">

                            <ul>
                                <?php if(isset($_SESSION['user_name_gbvn'])) {  ?>
                                <li><a href="/dang-xuat" style="color: white"><i class="fa fa-user" aria-hidden="true"></i> Đăng xuất</a></li>
                                <?php }else{ ?>
                                <li><a href="/dang-nhap" style="color: white"><i class="fa fa-user" aria-hidden="true"></i> Đăng nhâp</a></li>
                                <?php } ?>

                                <li><?php include DIR_CART."MS_CART_RUOUVANG_0004.php";?></li>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="gb-header-bottom_shophow">

            <div>

                <?php include DIR_MENU."MS_MENU_SHOPHOW_0003.php";?>

            </div>

        </div>

    </div>

</header>



<script src="/plugin/sticky/jquery.sticky.js"></script>

<script>

    $(document).ready(function () {

        $(".sticky-menu").sticky({topSpacing:0});

    });

</script>