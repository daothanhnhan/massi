<?php 
    $list = $action->getList('newscat','','','newscat_id','desc','','','');
    $languages = $action->getListLanguages();
?>

<form action="" method="post" id="addNews" enctype="multipart/form-data">
    <button class="btnAddTop" type="submit" style="position: fixed;top: 0;right: 220px;z-index: 9">Lưu</button>
    <input type="hidden" name="action" value="addNews">
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
                    if ($row['news_img'] != '') {
                    ?>
                        <img src="../images/<?= $row['news_img']?>" class="img-responsive" alt="Image">
                        <input type="hidden" name="news_img" value="<?= $row['news_img']?>">
                    <?php
                    }
                ?>                
                </div>
			</div>            
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Tiêu đề</p>
            <input type="text" class="txtNCP1" id="title" onchange="ChangeToSlug()" name="news_name"/>
            <p class="titleRightNCP">Mô tả ngắn:</p>
            <textarea class="longtxtNCP1" style="height:50px;display: block;" name="news_des"></textarea>
            <p class="titleRightNCP">Nội dung :</p>
            <p style="width:100%;margin-top:5px;"><textarea class="longtxtNCP1 ckeditor" id="editor1" name="news_content"></textarea></p>
            <div class="rowNCP">
                <div class="subColContent">
                    <p class="titleRightNCP" >Tác phẩm</p>
                    <input type="text" class="txtNCP1" value="" name="news_sub_info1"/>
                </div>
                <div class="subColContent">
                    <p class="titleRightNCP" >Tác giả</p>
                    <input type="text" class="txtNCP1" value="" name="news_author"/>
                </div>
                <div class="subColContent" style="display: none;">
                    <p class="titleRightNCP" >Lượt xem</p>
                    <input type="number" class="txtNCP1" value="" name="news_views"/>
                </div>
            </div>
            <div class="subColContent">
                <p class="titleRightNCP">Danh mục</p>
                <select class="sltBV" name="newscat_id" size="10">
                    <?php $action->showCategoriesSelect($list, 'newscat_parent', 0, '', 'newscat_id', 'newscat_name', 0); ?>
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
            <label class="selectCate" <?php echo ($_SESSION['admin_role']==2)?'style="display: none;"':'';?> >
                <input type="checkbox" value="1" name="state" checked>
                Hoạt động
            </label>
        </div>
    </div><!--end rowNodeContentPage-->
    <button type="submit" class="btn btnSave">Lưu</button>
</form>

