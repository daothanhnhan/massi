<div class="fixedLeft">
    <div class="contentFL">
        <ul class="listMenuFL">

            <!-- tab quản lý chung -->
            <li><a href="index.php" title="" class="linkMenu <?php if ((!isset($_GET["page"]))) {
                    echo 'sltMenu';
                } ?>"><img src="image/manager2.png" class="iconMenu2"/><img src="image/manager.png" class="iconMenu"/>Quản
                    lí chung</a></li>

            <!-- tab tài khoản -->
            <li><a href="index.php?page=tai-khoan" title=""
                   class="linkMenu <?php if ($_GET["page"] == 'tai-khoan' || $_GET["page"] == 'sua-tai-khoan' || $_GET["page"] == 'them-tai-khoan') {
                       echo 'sltMenu';
                   } ?>"><img src="image/page2.png" class="iconMenu2"/><img src="image/page.png" class="iconMenu"/>Tài
                    khoản</a></li>

            <!-- tab tài khoản user -->
            <li><a href="index.php?page=tai-khoan-user" title=""
                   class="linkMenu <?php if ($_GET["page"] == 'tai-khoan-user' || $_GET["page"] == 'sua-tai-khoan-user') {
                       echo 'sltMenu';
                   } ?>" ><img src="image/page2.png" class="iconMenu2"/><img src="image/page.png" class="iconMenu"/>Tài khoản user</a></li>

            <!-- tab bài viết -->
           <li><a href="index.php?page=bai-viet" title=""
                   class="linkMenu <?php if ($_GET["page"] == 'bai-viet' || $_GET["page"] == 'sua-bai-viet' || $_GET["page"] == 'them-bai-viet') {
                       echo 'sltMenu';
                   } ?>"><img src="image/page2.png" class="iconMenu2"/><img src="image/page.png" class="iconMenu"/>Trang Page</a></li>

            <!-- tab danh mục tin tức -->
            <li><a href="index.php?page=danh-muc-tin-tuc" title=""
                   class="linkMenu <?php if ($_GET["page"] == 'danh-muc-tin-tuc' || $_GET["page"] == 'sua-danh-muc-tin-tuc' || $_GET["page"] == 'them-danh-muc-tin-tuc') {
                       echo 'sltMenu';
                   } ?>"><img src="image/page2.png" class="iconMenu2"/><img src="image/page.png" class="iconMenu"/>Danh
                    mục bài Post</a></li>

            <!-- tab tin tức -->
            <li><a href="index.php?page=tin-tuc" title=""
                   class="linkMenu <?php if ($_GET["page"] == 'tin-tuc' || $_GET["page"] == 'them-tin-tuc' || $_GET["page"] == 'sua-tin-tuc') {
                       echo 'sltMenu';
                   } ?>"><img src="image/news2.png" class="iconMenu2"/><img src="image/news.png" class="iconMenu"/>Danh sách bài Post</a></li>

            <!-- tab danh mục dịch vụ -->
           <!-- <li><a href="index.php?page=danh-muc-dich-vu" title=""
                   class="linkMenu <?php if ($_GET["page"] == 'danh-muc-dich-vu' || $_GET["page"] == 'sua-danh-muc-dich-vu' || $_GET["page"] == 'them-danh-muc-dich-vu') {
                       echo 'sltMenu';
                   } ?>"><img src="image/page2.png" class="iconMenu2"/><img src="image/page.png" class="iconMenu"/>Danh
                    mục dịch vụ</a></li> -->

            <!-- tab dịch vụ -->
            <li><a href="index.php?page=dich-vu" title=""
                   class="linkMenu <?php if ($_GET["page"] == 'dich-vu' || $_GET["page"] == 'them-dich-vu' || $_GET["page"] == 'sua-dich-vu') {
                       echo 'sltMenu';
                   } ?>"><img src="image/news2.png" class="iconMenu2"/><img src="image/news.png" class="iconMenu"/>Hướng dẫn chọn size</a></li>

            <!-- tab danh mục sản phẩm -->
            <li><a href="index.php?page=danh-muc-san-pham" title=""
                   class="linkMenu <?php if ($_GET["page"] == 'danh-muc-san-pham' || $_GET["page"] == 'them-danh-muc-san-pham' || $_GET["page"] == 'sua-danh-muc-san-pham') {
                       echo 'sltMenu';
                   } ?>"><img src="image/product2.png" class="iconMenu2"/><img src="image/product.png"
                                                                               class="iconMenu"/>Danh mục sản phẩm</a>
            </li>

            <!-- tab sản phẩm -->
            <li><a href="index.php?page=san-pham" title=""
                   class="linkMenu <?php if ($_GET["page"] == 'san-pham' || $_GET["page"] == 'them-san-pham' || $_GET["page"] == 'sua-san-pham') {
                       echo 'sltMenu';
                   } ?>"><img src="image/product2.png" class="iconMenu2"/><img src="image/product.png"
                                                                               class="iconMenu"/>Danh sách sản phẩm</a></li>

            <!-- tab đặt hàng -->
            <li><a href="index.php?page=don-hang" title=""
                   class="linkMenu <?php if ($_GET["page"] == 'don-hang' || $_GET["page"] == 'them-don-hang' || $_GET["page"] == 'sua-don-hang') {
                       echo 'sltMenu';
                   } ?>"><img src="image/page.png" class="iconMenu2"/><img src="image/page.png"
                                                                               class="iconMenu"/>Đơn hàng</a></li>

            <!-- tab cấu hình website -->
            <li><a href="index.php?page=config" title="" class="linkMenu <?php if ($_GET["page"] == 'config') {
                    echo 'sltMenu';
                } ?>"><img src="image/page2.png" class="iconMenu2"/><img src="image/page.png" class="iconMenu"/>Cấu hình
                    website</a></li>

            <!-- tab menu -->
            <li><a href="index.php?page=trinh-don" title=""
                   class="linkMenu <?php if ($_GET["page"] == 'trinh-don' || $_GET["page"] == 'them-trinh-don' || $_GET["page"] == 'sua-trinh-don') {
                       echo 'sltMenu';
                   } ?>"><img src="image/page2.png" class="iconMenu2"/><img src="image/page.png" class="iconMenu"/>Menu</a>
            </li>

             <li><a href="index.php?page=lien-he" title=""
                   class="linkMenu "><img src="image/page2.png" class="iconMenu2"/><img src="image/page.png" class="iconMenu"/>Liên hệ</a>
            </li>

            <!-- <li><a href="index.php?page=video" title=""
                   class="linkMenu "><img src="image/page2.png" class="iconMenu2"/><img src="image/page.png" class="iconMenu"/>Video</a>
            </li> -->

            <!-- tab danh sach người dùng đăng ký -->
            <!-- <li><a href="index.php?page=dang-ky" title=""
                   class="linkMenu <?php if ($_GET["page"] == 'dang-ky' || $_GET["page"] == 'them-dang-ky' || $_GET["page"] == 'sua-dang-ky') {
                       echo 'sltMenu';
                   } ?>"><img src="image/page2.png" class="iconMenu2"/><img src="image/page.png" class="iconMenu"/>Bảng
                    đăng ký</a></li> -->

            <!-- tab danh sach Thành viên tham gia -->
           <!--  <li><a href="index.php?page=thanh-vien" title=""
                   class="linkMenu <?php if ($_GET["page"] == 'thanh-vien' || $_GET["page"] == 'them-thanh-vien' || $_GET["page"] == 'sua-thanh-vien') {
                       echo 'sltMenu';
                   } ?>"><img src="image/page2.png" class="iconMenu2"/><img src="image/page.png" class="iconMenu"/>Đăng
                    ký thành viên</a></li> -->

            <!--<li><a href="index.php?page=khach-hang" title="" class="linkMenu <?php if ($_GET["page"] == 'khach-hang' || $_GET["page"] == 'sua-khach-hang' || $_GET["page"] == 'them-khach-hang') {
                echo 'sltMenu';
            } ?>"><img src="image/page2.png" class="iconMenu2" /><img src="image/page.png" class="iconMenu" />Khách hàng</a></li>
            	<li><a href="index.php?page=slider" title="" class="linkMenu <?php if ($_GET["page"] == 'slider' || $_GET["page"] == 'sua-slider' || $_GET["page"] == 'them-slider') {
                echo 'sltMenu';
            } ?>"><img src="image/photo2.png" class="iconMenu2" /><img src="image/photo.png" class="iconMenu" />Slider</a></li>
            	<li><a href="index.php?page=quang-cao" title="" class="linkMenu <?php if ($_GET["page"] == 'quang-cao' || $_GET["page"] == 'sua-quang-cao' || $_GET["page"] == 'them-quang-cao') {
                echo 'sltMenu';
            } ?>"><img src="image/shapes2.png" class="iconMenu2" /><img src="image/shapes.png" class="iconMenu" />Quảng cáo</a></li> -->

        </ul>
    </div><!--end contentFL-->
</div><!--end fixedLeft-->
<div class="fixedTop">
    <img src="image/view.png" class="iconFixedTop"/>
    <p class="titleFixedTop">
        <?php
        if (isset($_GET["page"])) {
            switch ($_GET["page"]) {

                /*------------- Bài viết -----------*/

                case "bai-viet":
                    echo "Bài Viết";
                    break;

                case "sua-bai-viet":
                    echo "Sửa Bài Viết";
                    break;

                case "them-bai-viet":
                    echo "Thêm Bài Viết";
                    break;

                /*---------- Danh mục tin tức ----------*/

                case "danh-muc-tin-tuc":
                    echo "Danh Mục Tin Tức";
                    break;

                case "sua-danh-muc-tin-tuc":
                    echo "Sửa Danh Mục Tin Tức";
                    break;

                case "them-danh-muc-tin-tuc":
                    echo "Thêm Danh Mục Tin Tức";
                    break;

                /*-------------- Tin tức ---------*/

                case "them-tin-tuc":
                    echo "Tin Tức / Thêm Tin Tức";
                    break;

                case "sua-tin-tuc":
                    echo "Tin Tức / Sửa Tin Tức";
                    break;

                case "tin-tuc":
                    echo "Tin Tức";
                    break;

                /*---------- Danh mục dịch vụ ----------*/

                case "danh-muc-dich-vu":
                    echo "Danh Mục Dịch Vụ";
                    break;

                case "sua-danh-muc-dich-vu":
                    echo "Sửa Danh Mục Dịch Vụ";
                    break;

                case "them-danh-muc-dich-vu":
                    echo "Thêm Danh Mục Dịch Vụ";
                    break;

                /*-------------- Dịch vụ ---------*/

                case "them-dich-vu":
                    echo "Dịch vụ / Thêm Dịch vụ";
                    break;

                case "sua-dich-vu":
                    echo "Dịch vụ / Sửa Dịch vụ";
                    break;

                case "dich-vu":
                    echo "Dịch Vụ";
                    break;

                /*------------ Sản phẩm -------------*/

                case "them-san-pham":
                    echo "Thêm Sản Phẩm";
                    break;

                case "sua-san-pham":
                    echo "Sửa Sản Phẩm";
                    break;

                case "san-pham":
                    echo "Sản Phẩm";
                    break;

                /*---------- Danh mục sản phẩm ----------*/
                case "loai-san-pham":
                    echo "Sản Phẩm / Loại Sản Phẩm";
                    break;

                case "sua-loai-san-pham":
                    echo "Sản Phẩm / Loại Sản Phẩm / Sửa Loại Sản Phẩm";
                    break;

                case "them-loai-san-pham":
                    echo "Sản Phẩm / Loại Sản Phẩm / Thêm Loại Sản Phẩm";
                    break;

                case "phan-loai-san-pham1":
                    echo "Sản Phẩm / Phân Loại Sản Phẩm 1";

                    break;
                case "sua-phan-loai-san-pham1":
                    echo "Sản Phẩm / Phân Loại Sản Phẩm 1 / Sửa Phân Loại Sản Phẩm 1";

                    break;
                case "them-phan-loai-san-pham1":
                    echo "Sản Phẩm / Phân Loại Sản Phẩm 1 / Thêm Phân Loại Sản Phẩm 1";

                    break;
                case "phan-loai-san-pham2":
                    echo "Sản Phẩm / Phân Loại Sản Phẩm 2";

                    break;
                case "sua-phan-loai-san-pham2":
                    echo "Sản Phẩm / Phân Loại Sản Phẩm 2 / Sửa Phân Loại Sản Phẩm 2";

                    break;
                case "them-phan-loai-san-pham2":
                    echo "Sản Phẩm / Phân Loại Sản Phẩm 2 / Thêm Phân Loại Sản Phẩm 2";

                    break;

                case "nha-san-xuat":
                    echo "Sản Phẩm / Nhà sản xuất";

                    break;

                case "them-nha-san-xuat":
                    echo "Sản Phẩm / Nhà sản xuất / Thêm nhà sản xuất";

                    break;

                case "sua-nha-san-xuat":
                    echo "Sản Phẩm / Nhà sản xuất / Sửa nhà sản xuất";

                    break;

                case "quang-cao":
                    echo "Quảng Cáo";
                    break;
                case "them-quang-cao":
                    echo "Quảng Cáo / Thêm Quảng Cáo";
                    break;

                case "sua-quang-cao":
                    echo "Quảng Cáo / Sửa Quảng Cáo";
                    break;

                case "slider":
                    echo "Slider";
                    break;
                case "them-slider":
                    echo "Slider / Thêm Slider";
                    break;

                case "sua-slider":
                    echo "Slider / Sửa Slider";
                    break;

                case "menu":
                    echo "Menu";
                    break;
                case "them-menu":
                    echo "Menu / Thêm Menu";
                    break;

                case "sua-menu":
                    echo "Menu / Sửa Menu";
                    break;

                case "don-hang":
                    echo "Đơn Hàng";
                    break;

                case "sua-don-hang":
                    echo "Đơn Hàng / Sửa Đơn Hàng";
                    break;

                default:
                    echo "Quản Lí Chung";
            }
        } else {
            echo "Quản Lí Chung";
        }
        ?>
    </p>

    <div class="rightFixedTop">
        <?php
        if (isset($_GET["page"])) {
            switch ($_GET["page"]) {

                /*------------ Menu -----------*/

                case "trinh-don":
                    echo "<a href='index.php?page=them-trinh-don' class='btn btnAddTop'>Thêm Mới</a>";
                    break;

                case "sua-trinh-don":
                    echo "<a href='index.php?page=trinh-don' class='btn btnAddTop'>Quay lại</a>";
                    echo "<a href='index.php?page=them-trinh-don' class='btn btnAddTop'>Thêm Mới</a>";
                    break;

                case "them-trinh-don":
                    echo "<a href='index.php?page=trinh-don' class='btn btnAddTop'>Quay lại</a>";
                    echo "<a href='index.php?page=them-trinh-don' class='btn btnAddTop'>Thêm Mới</a>";
                    break;

                /*------------- Tài khoản -------------*/

                case "tai-khoan":
                    echo "<a href='index.php?page=them-tai-khoan' class='btn btnAddTop'>Thêm Mới</a>";
                    break;

                case "sua-tai-khoan":
                    echo "<a href='index.php?page=tai-khoan' class='btn btnAddTop'>Quay lại</a>";
                    echo "<a href='index.php?page=them-tai-khoan' class='btn btnAddTop'>Thêm Mới</a>";
                    break;
                case "them-tai-khoan":
                    echo "<a href='index.php?page=tai-khoan' class='btn btnAddTop'>Quay lại</a>";
                    echo "<a href='index.php?page=them-tai-khoan' class='btn btnAddTop'>Thêm Mới</a>";
                    break;

                /*----------- Danh mục sản phẩm ----------*/

                case "danh-muc-san-pham":
                    echo "<a href='index.php?page=them-danh-muc-san-pham' class='btnTop btnAddTop'>Thêm Mới</a>";
                    break;

                case "sua-danh-muc-san-pham":
                    echo "<a class='btnTop btnAddTop' href='index.php?page=danh-muc-san-pham'>Quay lại</a>";
                    echo "<a class='btnTop btnAddTop' href='index.php?page=them-danh-muc-san-pham'>Thêm mới</a>";
                    break;

                case "them-danh-muc-san-pham":
                    echo "<a class='btnTop btnAddTop' href='index.php?page=danh-muc-san-pham'>Quay lại</a>";
                    echo "<a class='btnTop btnAddTop' href='index.php?page=them-danh-muc-san-pham'>Thêm mới</a>";
                    break;

                /*----------- Bài viết --------------*/

                case "sua-bai-viet":
                    echo "<a class='btnTop btnAddTop' href='index.php?page=bai-viet'>Quay lại</a>";
                    echo "<a class='btnTop btnAddTop' href='index.php?page=them-bai-viet'>Thêm mới</a>";
                    break;

                case "bai-viet":
                    echo "<a href='index.php?page=them-bai-viet' class='btnTop btnAddTop'>Thêm Mới</a>";
                    break;

                case "them-bai-viet":
                    echo "<a class='btnTop btnAddTop' href='index.php?page=nguoi-giup-viec'>Quay lại</a>";
                    echo "<a class='btnTop btnAddTop' href='index.php?page=them-nguoi-giup-viec'>Thêm mới</a>";
                    break;

                /*----------- Danh mục bài viết --------------*/

                case "sua-danh-muc-tin-tuc":
                    echo "<a class='btnTop btnAddTop' href='index.php?page=danh-muc-tin-tuc'>Quay lại</a>";
                    echo "<a class='btnTop btnAddTop' href='index.php?page=them-danh-muc-tin-tuc'>Thêm mới</a>";
                    break;

                case "danh-muc-tin-tuc":
                    echo "<a href='index.php?page=them-danh-muc-tin-tuc' class='btnTop btnAddTop'>Thêm Mới</a>";
                    break;

                case "them-danh-muc-tin-tuc":
                    echo "<a class='btnTop btnAddTop' href='index.php?page=danh-muc-tin-tuc'>Quay lại</a>";
                    echo "<a class='btnTop btnAddTop' href='index.php?page=them-danh-muc-tin-tuc'>Thêm mới</a>";
                    break;

                /*-------------- Tin tức ------------*/
                case "tin-tuc":
                    echo "<a href='index.php?page=them-tin-tuc' class='btnTop btnAddTop'>Thêm Mới</a>";
                    break;

                case "them-tin-tuc":
                    echo "<a class='btnTop btnAddTop' href='index.php?page=tin-tuc'>Quay lại</a>";
                    echo "<a class='btnTop btnAddTop' href='index.php?page=them-tin-tuc'>Thêm mới</a>";
                    break;

                case "sua-tin-tuc":
                    echo "<a class='btnTop btnAddTop' href='index.php?page=tin-tuc'>Quay lại</a>";
                    echo "<a class='btnTop btnAddTop' href='index.php?page=them-tin-tuc'>Thêm mới</a>";
                    break;

                /*----------- Danh mục dịch vụ --------------*/

                case "sua-danh-muc-dich-vu":
                    echo "<a class='btnTop btnAddTop' href='index.php?page=danh-muc-dich-vu'>Quay lại</a>";
                    echo "<a class='btnTop btnAddTop' href='index.php?page=them-danh-muc-dich-vu'>Thêm mới</a>";
                    break;

                case "danh-muc-dich-vu":
                    echo "<a href='index.php?page=them-danh-muc-dich-vu' class='btnTop btnAddTop'>Thêm Mới</a>";
                    break;

                case "them-danh-muc-dich-vu":
                    echo "<a class='btnTop btnAddTop' href='index.php?page=danh-muc-dich-vu'>Quay lại</a>";
                    echo "<a class='btnTop btnAddTop' href='index.php?page=them-danh-muc-dich-vu'>Thêm mới</a>";
                    break;

                /*-------------- Tin tức ------------*/
                case "dich-vu":
                    echo "<a href='index.php?page=them-dich-vu' class='btnTop btnAddTop'>Thêm Mới</a>";
                    break;

                case "them-dich-vu":
                    echo "<a class='btnTop btnAddTop' href='index.php?page=dich-vu'>Quay lại</a>";
                    echo "<a class='btnTop btnAddTop' href='index.php?page=them-dich-vu'>Thêm mới</a>";
                    break;

                case "sua-dich-vu":
                    echo "<a class='btnTop btnAddTop' href='index.php?page=dich-vu'>Quay lại</a>";
                    echo "<a class='btnTop btnAddTop' href='index.php?page=them-dich-vu'>Thêm mới</a>";
                    break;

                /////////////////////   Trang menu   ///////////////////

                //////////////////// TRang đơn hàng /////////////////
                case "don-hang":
                    echo "
										<a href='index.php?page=them-don-hang' class='btnTop btnAddTop'>Thêm Mới</a>						
												";
                    break;


                case "them-don-hang":
                    echo "
												<button type='submit' name='AddOrder' class='btnTop btnSaveTop'>Lưu</button>";
                    break;
                /*-------------- Người giúp việc --------------*/
                case "san-pham":
                    echo "<a href='index.php?page=them-san-pham' class='btnTop btnAddTop'>Thêm Mới</a>";
                    break;

                case "them-san-pham":
                    echo "<a class='btnTop btnAddTop' href='index.php?page=san-pham'>Quay lại</a>";
                    echo "<a class='btnTop btnAddTop' href='index.php?page=them-san-pham'>Thêm mới</a>";
                    break;

                case "sua-san-pham":
                    echo "<a class='btnTop btnAddTop' href='index.php?page=san-pham'>Quay lại</a>";
                    echo "<a class='btnTop btnAddTop' href='index.php?page=them-san-pham'>Thêm mới</a>";
                    break;

                case "loai-san-pham":
                    echo "
												<a href='index.php?page=them-loai-san-pham' class='btnTop btnAddTop'>Thêm Mới</a>						
												";
                    break;

                case "sua-loai-san-pham":
                    echo "<button onclick='history.go(-1);' class='btnTop btnAddTop'>Quay lại</button>
												<button type='submit' name='DeleteLSP' class='btnTop btnDeleteTop'>Xóa</button>
												<button type='submit' name='saveService' class='btnTop btnSaveTop'>Lưu</button>
												
												";
                    break;
                case "them-loai-san-pham":
                    echo "<button onclick='history.go(-1);' class='btnTop btnAddTop'>Quay lại</button>
												<button type='submit' name='AddLSP' class='btnTop btnSaveTop'>Lưu</button>";
                    break;

                case "phan-loai-san-pham1":
                    echo "
												<a href='index.php?page=them-phan-loai-san-pham1' class='btnTop btnAddTop'>Thêm Mới</a>			
											
												";
                    break;

                case "sua-phan-loai-san-pham1":
                    echo "<button onclick='history.go(-1);' class='btnTop btnAddTop'>Quay lại</button>
												<button type='submit' name='DeletePLSP1' class='btnTop btnDeleteTop'>Xóa</button>
												<button type='submit' name='SavePLSP1' class='btnTop btnSaveTop'>Lưu</button>";
                    break;
                case "them-phan-loai-san-pham1":
                    echo "<button onclick='history.go(-1);' class='btnTop btnAddTop'>Quay lại</button>
												<button type='submit' name='AddPLSP1' class='btnTop btnSaveTop'>Lưu</button>";
                    break;

                case "phan-loai-san-pham2":
                    echo "
												<a href='index.php?page=them-phan-loai-san-pham2' class='btnTop btnAddTop'>Thêm Mới</a>						
												";
                    break;

                case "sua-phan-loai-san-pham2":
                    echo "<button onclick='history.go(-1);' class='btnTop btnAddTop'>Quay lại</button>
												<button type='submit' name='DeletePLSP2' class='btnTop btnDeleteTop'>Xóa</button>
												<button type='submit' name='SavePLSP2' class='btnTop btnSaveTop'>Lưu</button>";
                    break;
                case "them-phan-loai-san-pham2":
                    echo "<button onclick='history.go(-1);' class='btnTop btnAddTop'>Quay lại</button>
												<button type='submit' name='AddPLSP2' class='btnTop btnSaveTop'>Lưu</button>";
                    break;

                case "nha-san-xuat":
                    echo "
												<a href='index.php?page=them-nha-san-xuat' class='btnTop btnAddTop'>Thêm Mới</a>						
												";
                    break;

                case "sua-nha-san-xuat":
                    echo "<button onclick='history.go(-1);' class='btnTop btnAddTop'>Quay lại</button>
												<button type='submit' name='DeleteNSX' class='btnTop btnDeleteTop'>Xóa</button>
												<button type='submit' name='SaveNSX' class='btnTop btnSaveTop'>Lưu</button>";
                    break;
                case "them-nha-san-xuat":
                    echo "<button onclick='history.go(-1);' class='btnTop btnAddTop'>Quay lại</button>
												<button type='submit' name='AddNSX' class='btnTop btnSaveTop'>Lưu</button>";
                    break;

                ///////////////////////////// Trang Slider /////////////////
                case "slider":
                    echo "
												<a href='index.php?page=them-slider' class='btnTop btnAddTop'>Thêm Mới</a>						
												";
                    break;

                case "them-slider":
                    echo "<button onclick='history.go(-1);' class='btnTop btnAddTop'>Quay lại</button>
					<button type='submit' name='AddSlider' class='btnTop btnSaveTop'>Lưu</button>";
                    break;

                case "sua-slider":
                    echo "<button onclick='history.go(-1);' class='btnTop btnAddTop'>Quay lại</button>
												<button type='submit' name='DeleteSlider' class='btnTop btnDeleteTop'>Xóa</button>
												<button type='submit' name='SaveSlider' class='btnTop btnSaveTop'>Lưu</button>								
												";
                    break;
                //////////////////////////// Quảng cáo //////////////////////
                case "quang-cao":
                    echo "
												<a href='index.php?page=them-quang-cao' class='btnTop btnAddTop'>Thêm Mới</a>						
												";
                    break;

                case "them-quang-cao":
                    echo "<button onclick='history.go(-1);' class='btnTop btnAddTop'>Quay lại</button>
					<button type='submit' name='AddQC' class='btnTop btnSaveTop'>Lưu</button>";
                    break;

                case "sua-quang-cao":
                    echo "<button onclick='history.go(-1);' class='btnTop btnAddTop'>Quay lại</button>
												<button type='submit' name='DeleteQC' class='btnTop btnDeleteTop'>Xóa</button>
												<button type='submit' name='SaveQC' class='btnTop btnSaveTop'>Lưu</button>								
												";
                ///////////////////////////// Default ////////////////////////
                default:
                    break;
            }
        } else {
            echo "<a href='index.php?logout' class='btnTop logout'>Đăng xuất</a>";
        }
        ?>
    </div>
    <div style="float: right;margin-right: 300px;"><p class='titleFixedTop'>User: <?php echo (isset($_SESSION['admin_name']))?$_SESSION['admin_name']:"";?></p></div>
</div><!--end fixedTop-->

<div class="logoTop">
    <a href="/" class="linkLogoTop"><img src="image/logoTop.png" class="imgLogoTop"/></a>
    <a href="/" class="linkIconTop"><img src="image/view.png" class="imgIconTop"/></a>
</div><!--end logoTop-->