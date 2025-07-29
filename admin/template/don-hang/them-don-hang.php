<div class="rowNodeContentPage">
    <div class="leftNCP">
        <span class="titLeftNCP">Nội dung trang</span>
        <p class="subLeftNCP">Nhập tiêu đề và nội dung cho trang<br/><br/></p>
        <p class="subLeftNCP">Chọn ảnh đại diện. Tỉ lệ hình ảnh yêu cầu là 4x3.</p>
        <input type="file" class="choseIMGNews" name="UrlAnh"/>
    </div>
    <div class="boxNodeContentPage">
        <p class="titleRightNCP">Tên khách hàng</p>
        <input type="text" class="txtNCP1" value="" name="titleNews"/>
        <p class="titleRightNCP">Địa chỉ</p>
        <input type="text" class="txtNCP1" value="" name="titleNews"/>
        <p class="titleRightNCP">Số điện thoại</p>
        <input type="text" class="txtNCP1" value="" name="titleNews"/>
        <p class="titleRightNCP">Email</p>
        <input type="text" class="txtNCP1" value="" name="titleNews"/>
        <p class="titleRightNCP">Mô tả ngắn:</p>
        <textarea class="longtxtNCP1" style="height:50px;" name="shortDes">Nội dung mô tả ngắn</textarea>
        <!--<p class="titleRightNCP">Mô tả dài:</p>
        <textarea class="longtxtNCP1" style="height:80px;"  name="longDes">Nội dung mô tả dài</textarea>-->
        <p class="titleRightNCP">Nội dung</p>
        <textarea class="longtxtNCP1" name="contentNews">Noi dung bai viet</textarea>
        <div class="subColContent">
            <p class="titleRightNCP">Tác giả</p>
            <select class="sltBV" name="author">
                <?php
                $tg = new tintuc('VN');
                $sql = "select * from tacgia";
                $tg->query($sql, 'VN');
                while ($rows = $tg->fetch('VN')) {
                    echo "<option value = ";
                    echo $rows['IDTacGia'];
                    echo ">";
                    echo $rows['TenTacGia'];
                    echo "</option>";
                }
                ?>
            </select>
        </div>
        <div class="subColContent">
            <p class="titleRightNCP">Chuyên mục</p>
            <select class="sltBV" name="CatNews">
                <?php
                $dm = new tintuc('VN');
                $sql = "select * from danhmuc";
                $dm->query($sql, 'VN');
                while ($rows = $dm->fetch('VN')) {
                    echo "<option value = ";
                    echo $rows['ID'];
                    echo ">";
                    echo $rows['TenDanhMuc'];
                    echo "</option>";
                }

                ?>
            </select>
        </div>
    </div>
</div><!--end rowNodeContentPage-->
<div class="rowNodeContentPage">
    <div class="leftNCP">
        <span class="titLeftNCP">Tối ưu SEO</span>
        <p class="subLeftNCP">Thiết lập thẻ tiêu đề, thẻ mô tả, đường dẫn. Những thông tin này xác định cách danh mục
            xuất hiện trên công cụ tìm kiếm.</p>
    </div>
    <div class="boxNodeContentPage">
        <p class="titleRightNCP">Tiêu đề trang</p>
        <p class="subRightNCP">Số ký tự đã dùng: 0/70</p>
        <input type="text" class="txtNCP1" value="Điều khoản dịch vụ" name="titleSEO"/>
        <p class="titleRightNCP">Thẻ mô tả</p>
        <p class="subRightNCP">Số ký tự đã dùng: 0/160 </p>
        <textarea class="longtxtNCP2" name="desSEO">Khi quý khách truy cập vào trang web của chúng tôi có nghĩa là quý khách đồng ý với các điều khoản này. Trang web có quyền thay đổi, chỉnh sửa, thêm hoặc lược</textarea>
        <p class="titleRightNCP">Đường dẫn</p>
        <div class="coverLinkNCP">
            <p class="nameLinkNCP">http://goldbridgevn.com/</p>
            <input type="text" class="txtLinkNCP" value=""/>
        </div>
    </div>
</div><!--end rowNodeContentPage-->
<div class="rowNodeContentPage">
    <div class="leftNCP">
        <span class="titLeftNCP">Trạng thái</span>
        <p class="subLeftNCP">Thiết lập chế độ hiển thị cho trang nội dung</p>
    </div>
    <div class="boxNodeContentPage">
        <p>
            <label class="radioNCP">
                <input type="radio" name="RadioGroup1" value="1" id="RadioGroup1_0" checked="true"/>
                Hiển thị</label>
            <br/>
            <label class="radioNCP">
                <input type="radio" name="RadioGroup1" value="2" id="RadioGroup1_1"/>
                Ẩn</label>
            <br/>
        </p>
    </div>
</div><!--end rowNodeContentPage-->
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br/>Sản phẩm thuộc Công ty TNHH Truyền
    Thông Và Công Nghệ GoldBridge Việt Nam</p>