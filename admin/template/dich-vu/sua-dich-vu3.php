<?php 
    $service_id = isset($_GET['id']) ? $_GET['id'] : '';
    $row = $action->getDetail_New('service',array('service_id'), array(&$service_id),'i');
    if ($row == '') {
        header('location:index.php?page=dich-vu');
    }
    $list = $action->getList('servicecat','','','servicecat_id','desc','','','');
    $list_tag = $action->getList('servicetag','','','servicetag_id','desc','','','');
    $languages = $action->getListLanguages();

    $action_showMain = new action_page('VN');
    $lang_showMain = "vn";
    $row_showMain = $action_showMain->getDetail_New('service_languages',array('service_id','languages_code'),array(&$row['service_id'], &$lang_showMain),'is');
?>
<?php 
    $servicetag_arr = unserialize($row['servicetag_arr']);
?>
<form action="" id="updateLangService">
    <input type="hidden" name="action" value="updateLangservice">
    <input type="hidden" name="service_id" value="<?= $row['service_id']?>">
    <div class="modal fade" id="modal-id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Chỉnh sửa ngôn ngữ</h4>
                </div>
                <div class="modal-body">
                    <div role="tabpanel">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <?php 
                                foreach ($languages as $key => $lang) {
                                ?>
                                    <li role="presentation" class="<?= $key == 0 ? 'active' : ''?>">
                                        <a href="#<?= $lang['languages_code']?>" aria-controls="home" role="tab" data-toggle="tab"><?= $lang['languages_name']?></a>
                                    </li>
                                <?php
                                }
                            ?>
                        </ul>
                    
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <?php 
                                foreach ($languages as $key => $lang) {
                                    $action1 = new action_page('VN');
                                    $rowDetailLang = $action1->getDetail_New('service_languages',array('service_id','languages_code'),array(&$row['service_id'], &$lang['languages_code']),'is');
                                    
                                ?>
                                    <div role="tabpanel" class="tab-pane <?= $key == 0 ? 'active' : ''?>" id="<?= $lang['languages_code']?>">
                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_service_sub_info1]" value="">
                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_service_sub_info2]" value="">
                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_service_sub_info3]" value="">
                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_service_sub_info4]" value="">
                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_service_sub_info5]" value="">
                                        <p class="titleRightNCP">Tiêu đề</p>
                                        <input type="text" class="txtNCP1" value="<?= $rowDetailLang['lang_service_name'];?>" name="lang[<?= $lang['languages_code']?>][lang_service_name]"/>
                                        
                                        <p class="titleRightNCP">Mô tả ngắn</p>
                                        <textarea class="longtxtNCP2" rows="3" name="lang[<?= $lang['languages_code']?>][lang_service_des]"><?= $rowDetailLang['lang_service_des'];?></textarea>
                                        <p class="titleRightNCP">Nội dung</p>
                                        <p style="width:100%;margin-top:5px;"><textarea class="longtxtNCP1 ckeditor" id="editor1" name="lang[<?= $lang['languages_code']?>][lang_service_content]" ><?= $rowDetailLang['lang_service_content'];?></textarea></p>
                                    </div>
                                <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="" method="post" id="updateService" enctype="multipart/form-data">

    <button class="btnAddTop" type="submit" style="position: fixed;top: 0;right: 220px;z-index: 9;<?php echo ($_SESSION['admin_role']==2)?'display: none;':'';?>">Lưu</button>
    <a class="btnAddTop" data-toggle="modal" href='#modal-id' style="position: fixed;top: 0;right: 285px;z-index: 9;<?php echo ($hidden_multi_lang=='hidden')?'display: none;':'';?>">Chỉnh sửa ngôn ngữ</a>
    <input type="hidden" name="service_id" value="<?= $service_id?>">
    <input type="hidden" name="action" value="updateService">
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
            <input type="text" class="txtNCP1" id="title" onchange="ChangeToSlug()" name="service_name" value="<?= $row_showMain['lang_service_name']?>"/>
            <p class="titleRightNCP">Mô tả ngắn:</p>
            <textarea class="longtxtNCP1" style="height:50px;" name="service_des"><?= $row_showMain['lang_service_des']?></textarea>
            <p class="titleRightNCP">Nội dung :</p>
            <p style="width:100%;margin-top:5px;"><textarea class="longtxtNCP1 ckeditor" id="editor1" name="service_content"><?= $row_showMain['lang_service_content']?></textarea></p>
            <div class="rowNCP">
                <div class="subColContent">
                    <p class="titleRightNCP" >Tác giả</p>
                    <input type="text" class="txtNCP1" value="<?= $row['service_author']?>" name="service_author"/>
                </div>
                <div class="subColContent">
                    <p class="titleRightNCP" >Lượt xem</p>
                    <input type="number" class="txtNCP1" value="<?= $row['service_views']?>" name="service_views"/>
                </div>
            </div>
            <div class="subColContent">
                <p class="titleRightNCP">Danh mục</p>
                <select class="sltBV" name="servicecat_id" size="10">
                    <?php $action->showCategoriesSelect($list, 'servicecat_parent', 0, $row['servicecat_id'], 'servicecat_id', 'servicecat_name', 0); ?>
                </select>
            </div>
            <div class="subColContent">
                <p class="titleRightNCP">Thẻ Tag</p>
                <select name="servicetag_id[]" class="selectpicker" multiple>
                <?php 
                    foreach ($list_tag as $item) {
                        if (in_array($item['servicetag_id'], $servicetag_arr)) {
                            echo '<option value="'.$item['servicetag_id'].'" selected>'.$item['servicetag_name'].'</option>';
                        } else {
                            echo '<option value="'.$item['servicetag_id'].'">'.$item['servicetag_name'].'</option>';
                        }
                    }
                 ?>
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
                <input type="text" class="txtNCP1" placeholder="Điều khoản dịch vụ" name="title_seo" id="title_seo" value="<?php echo $row_showMain['title_seo'];?>" onkeyup="countChar(this)"/>
            </div>
            <div>
                <p class="titleRightNCP">Thẻ mô tả</p>
                <p class="subRightNCP"><strong class="text-character">0</strong>/160 ký tự</p>
                <textarea class="longtxtNCP2" name="des_seo" onkeyup="countChar(this)"><?php echo $row_showMain['des_seo'];?></textarea>
            </div>
            <p class="titleRightNCP">Keyword</p>
            <input type="text" class="txtNCP1"  name="keyword" value="<?= $row_showMain['keyword']?>" />
            <p class="titleRightNCP">Đường dẫn</p>
            <div class="coverLinkNCP">
                <div id="slug">
                    <input type="text" id="slug1" class="txtLinkNCP" name="friendly_url" value="<?= $row_showMain['friendly_url']?>" /> 
                </div>    
            </div>
        </div>
    </div><!--end rowNodeContentPage-->

    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Trạng thái</span>
        </div>
        <div class="boxNodeContentPage">
            <div>
                <label class="selectCate">
                    <input type="checkbox" value="1" name="state" <?= $row['state'] == 1 ? 'checked' : '' ?>>Trạng thái hiển thị
                </label>
            </div>
            
        </div>
    </div><!--end rowNodeContentPage-->

    <button type="submit" class="btn btnSave" <?php echo ($_SESSION['admin_role']==2)?'style="display: none;"':'';?>>Lưu</button>
    <button type="submit" class="btn btnDelete" id="deleteService" data-id="<?= $service_id?>" data-action="deleteService" <?php echo ($_SESSION['admin_role']==2)?'style="display: none;"':'';?>>Xóa</button>
</form>

