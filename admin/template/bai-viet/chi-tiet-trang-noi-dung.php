
<?php
    $page_id = isset($_GET['id']) ? $_GET['id'] : '';
    $row = $action->getDetail('page','page_id',$page_id);
    if ($row == '') {
        header('location: index.php?page=bai-viet');
    }

    $languages = $action->getListLanguages();

    $action_showMain = new action_page('VN');
    $lang_showMain = "vn";
    $row_showMain = $action_showMain->getDetail_New('page_languages',array('page_id','languages_code'),array(&$row['page_id'], &$lang_showMain),'is');
?>

<script>
    // $(document).ready(function(){
    //     $('#updateLangPage').on('submit',function(e){
    //         e.preventDefault();
    //         var form = $(this);
    //         $.ajax({
    //             url: 'ajax.php',
    //             data: form.serialize(),
    //             type: 'post',
    //             dataType: 'json',
    //             success: function(json){
    //                 if(json['success']){
    //                     alert(json['success']);
    //                 }
    //                 if(json['error']){
    //                     alert(json['error']);
    //                 }
    //             }
    //         })
    //     })
    // })
</script>
<form action="" id="updateLangPage">
    <input type="hidden" name="action" value="updateLangPage">
    <input type="hidden" name="page_id" value="<?= $row['page_id']?>">
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
                                    $rowDetailLang = $action1->getDetail_New('page_languages',array('page_id','languages_code'),array(&$row['page_id'], &$lang['languages_code']),'is');
                                    
                                ?>
                                    <div role="tabpanel" class="tab-pane <?= $key == 0 ? 'active' : ''?>" id="<?= $lang['languages_code']?>">
                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_page_sub_info1]" value="">
                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_page_sub_info2]" value="">
                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_page_sub_info3]" value="">
                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_page_sub_info4]" value="">
                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_page_sub_info5]" value="">
                                        
                                        <p class="titleRightNCP">Tiêu đề</p>
                                        <input type="text" class="txtNCP1" onchange="ChangeToSlug_<?= $lang['languages_code']?>()" value="<?= $rowDetailLang['lang_page_name'];?>" name="lang[<?= $lang['languages_code']?>][lang_page_name]"/>
                                        
                                        <p class="titleRightNCP">Mô tả ngắn</p>
                                        <textarea class="longtxtNCP2" rows="3" name="lang[<?= $lang['languages_code']?>][lang_page_des]"><?= $rowDetailLang['lang_page_des'];?></textarea>

                                        <p class="titleRightNCP">Nội dung</p>
                                        <p style="width:100%;margin-top:5px;"><textarea class="longtxtNCP1 ckeditor" id="editor1<?= $lang['languages_code']?>" name="lang[<?= $lang['languages_code']?>][lang_page_content]"> <?= $rowDetailLang['lang_page_content'];?></textarea></p>

                                        


                                        <!-- <p style="width:100%;margin-top:5px;">
                                        <input type="text" class="txtNCP1" value="<?= $rowDetailLang['lang_page_content'];?>" name="lang[<?= $lang['languages_code']?>][lang_page_content]"/></p> -->

                                        <!-- start -->

                                        <p class="titleRightNCP">Tiêu đề trang</p>
                                        <p class="subRightNCP"> <strong class="text-character">0</strong>/70 ký tự</p>
                                        <input type="text" class="txtNCP1" placeholder="Điều khoản dịch vụ" name="lang[<?= $lang['languages_code']?>][title_seo]" id="title_seo" value="<?php echo $rowDetailLang['title_seo'];?>" onkeyup="countChar(this)"/>
                                    
                                        <p class="titleRightNCP">Thẻ mô tả</p>
                                        <p class="subRightNCP"><strong class="text-character">0</strong>/160 ký tự</p>
                                        <textarea class="longtxtNCP2" name="lang[<?= $lang['languages_code']?>][des_seo]" onkeyup="countChar(this)"><?php echo $rowDetailLang['des_seo'];?></textarea>
                                        
                                        <p class="titleRightNCP">Keyword</p>
                                        <input type="text" class="txtNCP1"  name="lang[<?= $lang['languages_code']?>][keyword]" value="<?php echo $rowDetailLang['keyword']?>"/>
                                        <p class="titleRightNCP">Đường dẫn</p>
                                        <div class="coverLinkNCP">
                                            <div  id="slug">
                                                <input type="text" id="slug1" class="txtLinkNCP" name="lang[<?= $lang['languages_code']?>][friendly_url]" value="<?php echo $rowDetailLang['friendly_url']?>"/> 
                                            </div>    
                                        </div>
                                        <!-- end -->
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
<form action="" method="post" accept-charset="utf-8" id="updatePage">
    <button class="btnAddTop" type="submit" style="position: fixed;top: 0;right: 220px;z-index: 9;<?php echo ($_SESSION['admin_role']==2)?'display: none;':'';?>">Lưu</button>
    <a class="btnAddTop" data-toggle="modal" href='#modal-id' style="position: fixed;top: 0;right: 285px;z-index: 9;<?php echo ($hidden_multi_lang=='hidden')?'display: none;':'';?>">Chỉnh sửa ngôn ngữ</a>
    <input type="hidden" name="page_id" value="<?php echo $page_id;?>"/>
    <input type="hidden" name="action" value="updatePage">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung trang</span>
            <p class="subLeftNCP">Nhập tiêu đề và nội dung cho trang</p>      
            <p class="titleRightNCP">Chọn ảnh</p>
            <div id="wrapper">
                <input id="fileUpload" type="file" name="fileUpload1"/>
                <br />
                <div id="image-holder">
                    <?php 
                        if ($row['page_img'] != '') {
                        ?>
                            <img src="../images/<?= $row['page_img']?>" class="img-responsive" alt="Image">
                            <input type="hidden" name="page_img" value="<?= $row['page_img']?>">
                        <?php
                        }
                    ?>
                </div>
            </div> 
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Tiêu đề</p>
            <input type="text" class="txtNCP1" id="title" onchange="ChangeToSlug()" value="<?= $row_showMain['lang_page_name'];?>" name="page_name"/>
            
            <p class="titleRightNCP">Mô tả ngắn</p>
            <textarea class="longtxtNCP2" rows="3" name="page_des"><?= $row_showMain['lang_page_des'];?></textarea>
            <p class="titleRightNCP">Nội dung</p>
            <p style="width:100%;margin-top:5px;"><textarea class="longtxtNCP1 ckeditor" id="editor1" name="page_content" ><?= $row_showMain['lang_page_content'];?></textarea></p>
          
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
            <input type="text" class="txtNCP1"  name="keyword" value="<?php echo $row_showMain['keyword']?>"/>
            <p class="titleRightNCP">Đường dẫn</p>
            <div class="coverLinkNCP">
                <div  id="slug">
                    <input type="text" id="slug1" class="txtLinkNCP" name="friendly_url" value="<?php echo $row_showMain['friendly_url']?>"/> 
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
                <input type="checkbox" value="1" name="state" <?= $row['state'] == 1 ? 'checked' : ''?>>
                Hoạt động
            </label>
        </div>
    </div><!--end rowNodeContentPage-->
   
    <button type="submit" class="btn btnSave" <?php echo ($_SESSION['admin_role']==2)?'style="display: none;"':'';?>>Lưu</button>
    <button type="button" class="btn btnDelete" id="deletePage" data-id="<?= $page_id?>" data-action="deletePage" <?php echo ($_SESSION['admin_role']==2)?'style="display: none;"':'';?>>Xóa</button>
</form>


