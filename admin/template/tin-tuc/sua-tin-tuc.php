<?php 
    $news_id = isset($_GET['id']) ? $_GET['id'] : '';
    $row = $action->getDetail_New('news',array('news_id'), array(&$news_id),'i');
    if ($row == '') {
        header('location:index.php?page=tin-tuc');
    }
    $list = $action->getList('newscat','','','newscat_id','desc','','','');
    $languages = $action->getListLanguages();

    $action_showMain = new action_page('VN');
    $lang_showMain = "vn";
    $row_showMain = $action_showMain->getDetail_New('news_languages',array('news_id','languages_code'),array(&$row['news_id'], &$lang_showMain),'is');
?>

<form action="" id="updateLangNews">
    <input type="hidden" name="action" value="updateLangNews">
    <input type="hidden" name="news_id" value="<?= $row['news_id']?>">
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
                                    $rowDetailLang = $action1->getDetail_New('news_languages',array('news_id','languages_code'),array(&$row['news_id'], &$lang['languages_code']),'is');
                                    
                                ?>
                                    <div role="tabpanel" class="tab-pane <?= $key == 0 ? 'active' : ''?>" id="<?= $lang['languages_code']?>">
                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_news_sub_info1]" value="">
                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_news_sub_info2]" value="">
                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_news_sub_info3]" value="">
                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_news_sub_info4]" value="">
                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_news_sub_info5]" value="">
                                        <p class="titleRightNCP">Tiêu đề</p>
                                        <input type="text" class="txtNCP1" value="<?= $rowDetailLang['lang_news_name'];?>" name="lang[<?= $lang['languages_code']?>][lang_news_name]"/>
                                        
                                        <p class="titleRightNCP">Mô tả ngắn</p>
                                        <textarea class="longtxtNCP2" rows="3" name="lang[<?= $lang['languages_code']?>][lang_news_des]"><?= $rowDetailLang['lang_news_des'];?></textarea>
                                        <p class="titleRightNCP">Nội dung</p>
                                        <p style="width:100%;margin-top:5px;"><textarea class="longtxtNCP1 ckeditor" id="editor1<?= $lang['languages_code']?>" name="lang[<?= $lang['languages_code']?>][lang_news_content]" ><?= $rowDetailLang['lang_news_content'];?></textarea></p>
                                        <p class="titleRightNCP">Tiêu đề trang</p>
                                        <input type="text" class="txtNCP1" value="<?= $rowDetailLang['title_seo'];?>" name="lang[<?= $lang['languages_code']?>][title_seo]"/>
                                        <p class="titleRightNCP">Thẻ mô tả</p>
                                        <textarea class="longtxtNCP2" rows="3" name="lang[<?= $lang['languages_code']?>][des_seo]"><?= $rowDetailLang['des_seo'];?></textarea>
                                        <p class="titleRightNCP">Keyword</p>
                                        <input type="text" class="txtNCP1" value="<?= $rowDetailLang['keyword'];?>" name="lang[<?= $lang['languages_code']?>][keyword]"/>
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

<form action="" method="post" id="updateNews" enctype="multipart/form-data">

    <button class="btnAddTop" type="submit" style="position: fixed;top: 0;right: 220px;z-index: 9;<?php echo ($_SESSION['admin_role']==2)?'':'';?>">Lưu</button>
    <a class="btnAddTop" data-toggle="modal" href='#modal-id' style="position: fixed;top: 0;right: 285px;z-index: 9;<?php echo ($hidden_multi_lang=='hidden')?'display: none;':'';?>">Chỉnh sửa ngôn ngữ</a>
    <input type="hidden" name="news_id" value="<?= $news_id?>">
    <input type="hidden" name="action" value="updateNews">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung trang</span>
            <p class="subLeftNCP">Nhập tiêu đề và nội dung cho trang<br /><br /></p>     
            <p class="subLeftNCP">Chọn ảnh đại diện. Tỉ lệ hình ảnh yêu cầu là 4x3.</p> 
            <p id="demo"></p>
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
            <input type="text" class="txtNCP1" id="title" onchange="ChangeToSlug()" name="news_name" value="<?= $row['news_name']?>"/>
            <p class="titleRightNCP" style="display: block;">Mô tả ngắn:</p>
            <textarea class="longtxtNCP1" style="height:50px;display: block;" name="news_des"><?= $row_showMain['lang_news_des']?></textarea>
            <p class="titleRightNCP">Nội dung :</p>
            <p style="width:100%;margin-top:5px;"><textarea class="longtxtNCP1 ckeditor" id="editor1" name="news_content"><?= $row['news_content']?></textarea></p>
            <div class="rowNCP">
                <div class="subColContent">
                    <p class="titleRightNCP" >Tác phẩm</p>
                    <input type="text" class="txtNCP1" value="<?= $row['news_sub_info1']?>" name="news_sub_info1"/>
                </div>
                <div class="subColContent">
                    <p class="titleRightNCP" >Tác giả</p>
                    <input type="text" class="txtNCP1" value="<?= $row['news_author']?>" name="news_author"/>
                </div>
                <div class="subColContent" style="display: none;">
                    <p class="titleRightNCP" >Lượt xem</p>
                    <input type="number" class="txtNCP1" value="<?= $row['news_views']?>" name="news_views"/>
                </div>
            </div>
            <div class="subColContent">
                <p class="titleRightNCP">Danh mục</p>
                <select class="sltBV" name="newscat_id" size="10">
                    <?php $action->showCategoriesSelect($list, 'newscat_parent', 0, $row['newscat_id'], 'newscat_id', 'newscat_name', 0); ?>
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
            <span class="titLeftNCP">Trạng thái Phê duyệt</span>
        </div>
        <div class="boxNodeContentPage" <?php echo ($_SESSION['admin_role']==2)?'style="display: none;"':'';?> >
            <div>
                <label class="selectCate">
                    <input type="checkbox" value="1" name="state" <?= $row['state'] == 1 ? 'checked' : '' ?>>Trạng thái duyệt bài
                </label>
            </div>
            
        </div>
    </div><!--end rowNodeContentPage-->

    <button type="submit" class="btn btnSave" <?php echo ($_SESSION['admin_role']==2) ? '':'';?> >Lưu</button>
    <button type="submit" class="btn btnDelete" id="deleteNews" data-id="<?= $news_id?>" data-action="deleteNews" <?php echo ($_SESSION['admin_role']==2)?'style="display: none;"':'';?> >Xóa</button>
</form>

