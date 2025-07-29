<?php 
    $list = $action->getList('servicecat','','','servicecat_id','desc','','','');
    $languages = $action->getListLanguages();
?>

<form action="" method="post" id="addService" enctype="multipart/form-data">
    <button class="btnAddTop" type="submit" style="position: fixed;top: 0;right: 220px;z-index: 9">Lưu</button>
    <input type="hidden" name="action" value="addService">
	<div class="rowNodeContentPage">
    	<div class="leftNCP">
        	<span class="titLeftNCP">Nội dung trang</span>
            <p class="subLeftNCP">Nhập tiêu đề và nội dung cho trang<br /><br /></p>     
            <p class="subLeftNCP">Chọn ảnh đại diện. Tỉ lệ hình ảnh yêu cầu là 4x3.</p> 
        	<div id="wrapper">
				<input id="fileUpload" type="file" name="fileUpload1"/>
				<br />
				<div id="image-holder">
                <?php 
                    if ($row['service_img'] != '') {
                    ?>
                        <img src="../images/<?= $row['service_img']?>" class="img-responsive" alt="Image">
                        <input type="hidden" name="service_img" value="<?= $row['service_img']?>">
                    <?php
                    }
                ?>                
                </div>
			</div>            
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Tiêu đề</p>
            <input type="text" class="txtNCP1" id="title" onchange="ChangeToSlug()" name="service_name"/>
            <p class="titleRightNCP">Mô tả ngắn:</p>
            <textarea class="longtxtNCP1" style="height:50px;" name="service_des"></textarea>
            <p class="titleRightNCP">Nội dung :</p>
            <p style="width:100%;margin-top:5px;"><textarea class="longtxtNCP1 ckeditor" id="editor1" name="service_content"></textarea></p>
            <div class="rowNCP">
                <div class="subColContent">
                    <p class="titleRightNCP" >Tác giả</p>
                    <input type="text" class="txtNCP1" value="" name="service_author"/>
                </div>
                <div class="subColContent">
                    <p class="titleRightNCP" >Lượt xem</p>
                    <input type="number" class="txtNCP1" value="" name="service_views"/>
                </div>
            </div>
            <div class="subColContent">
                <p class="titleRightNCP">Danh mục</p>
                <select class="sltBV" name="servicecat_id" size="10">
                    <?php $action->showCategoriesSelect($list, 'servicecat_parent', 0, '', 'servicecat_id', 'servicecat_name', 0); ?>
                </select>
            </div>
        </div>
    </div><!--end rowNodeContentPage-->
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Tối ưu SEO</span>
            <p class="subLeftNCP">Thiết lập thẻ tiêu đề, thẻ mô tả, đường dẫn. Những thông tin này xác định cách danh mục xuất hiện trên công cụ tìm kiếm.</p>
        </div>
        <div class="boxNodeContentPage">
            <div>
                <p class="titleRightNCP">Tiêu đề trang</p>
                <p class="subRightNCP"> <strong class="text-character">0</strong>/70 ký tự</p>
                <input type="text" class="txtNCP1" placeholder="Điều khoản dịch vụ" name="title_seo" id="title_seo" value="<?php echo $row['title_seo'];?>" onkeyup="countChar(this)"/>
            </div>
            <div>
                <p class="titleRightNCP">Thẻ mô tả</p>
                <p class="subRightNCP"><strong class="text-character">0</strong>/160 ký tự</p>
                <textarea class="longtxtNCP2" name="des_seo" onkeyup="countChar(this)"><?php echo $row['des_seo'];?></textarea>
            </div>
            <p class="titleRightNCP">Keyword</p>
            <input type="text" class="txtNCP1"  name="keyword" />
            <p class="titleRightNCP">Đường dẫn</p>
            <div class="coverLinkNCP">
                <div id="slug">
                    <input type="text" id="slug1" class="txtLinkNCP" name="friendly_url" /> 
                </div>    
            </div>
        </div>
    </div><!--end rowNodeContentPage-->
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Trạng thái</span>
            <p class="subLeftNCP">Thiết lập chế độ hiển thị cho trang nội dung</p>                
        </div>
        <div class="boxNodeContentPage">
            <label class="selectCate">
                <input type="checkbox" value="1" name="state" checked>
                Hoạt động
            </label>
        </div>
    </div><!--end rowNodeContentPage-->
    <button type="submit" class="btn btnSave">Lưu</button>
</form>

