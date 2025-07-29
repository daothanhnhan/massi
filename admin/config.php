<?php
	$id = 1;
    $rowConfig = $action->getDetail_New('config', array('config_id'), array(&$id), 'i');
    // $row = $action->getDetail_New('product',array('product_id'),array(&$product_id),'i');
    // if ($rowConfig == '') {
    //     header('location: index.php?page=config');
    // }
    $languages = $action->getListLanguages();

    $action_showMain = new action_page('VN');
    $lang_showMain = "vn";
    $row_showMain = $action_showMain->getDetail_New('config_languages',array('config_id','languages_code'),array(&$rowConfig['config_id'], &$lang_showMain),'is');
?>		
<script src="js/previewImage.js"></script>
<script>

    function addMoreSize(self){
        var total = $(self).parents('.colorProduct').data('total');
        $.ajax({
            url: "ajax.php",
            data: {'action': 'addMoreSize', 'total': total },
            type: "post",
            success:function(html){
                $(self).parent('.size_section').append(html);
                //$("#size_section").append(html);
            }
        })
    }

    function deleteColor(val){
        $(val).parent().remove();
    }
    
    $(document).ready(function() {

        $('#addMoreSales').on('click',function(e){
            e.preventDefault();
            var total = $('.salesProduct').length;
            $.ajax({
                url: "ajax.php",
                data: {'action': 'addMoreSales', 'total': total },
                type: "post",
                success:function(html){
                    $("#sales_section").append(html);
                }
            })
        })

        $("#addMoreColor").on("click",function(e){
            e.preventDefault();
            var total = $('.colorProduct').length;
            $.ajax({
                url: "ajax.php",
                data: {'action': 'addMoreColor', 'total': total },
                type: "post",
                success:function(html){
                    $("#color_section").append(html);
                }
            })
        })

        $('#addSalePrice').on('click',function(e){
            e.preventDefault();
        })


        $("input[id=fileUpload2").previewimage({
            div: "#preview2",
            imgwidth: 90,
            imgheight: 90
        });

    });

    
</script>
<form action="" id="updateLangConfig">
    <input type="hidden" name="action" value="updateLangConfig">
    <input type="hidden" name="config_id" value="<?= $row['config_id']?>">
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
                                    $rowDetailLang = $action1->getDetail_New('config_languages',array('config_id','languages_code'),array(&$rowConfig['config_id'], &$lang['languages_code']),'is');
                                    
                                ?>
                                    <div role="tabpanel" class="tab-pane <?= $key == 0 ? 'active' : ''?>" id="<?= $lang['languages_code']?>">
                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_web_name]" value="">
                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_web_meta]" value="">
                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_web_des]" value="">
                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_web_keyword]" value="">
                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_web_hotline]" value="">
                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_web_phone]" value="">
                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_web_email]" value="">
                                        <input type="hidden" name="lang[<?= $lang['languages_code']?>][lang_content_home10]" value="">

                                        <p class="titleRightNCP">Dòng 1</p>
							            <input type="text" class="txtNCP1" value="<?= $rowDetailLang['lang_content_home1'];?>" name="lang[<?= $lang['languages_code']?>][lang_content_home1]"/>

							            <p class="titleRightNCP">Dòng 2</p>
							            <textarea name="lang[<?= $lang['languages_code']?>][lang_content_home2]" id="input" class="form-control" rows="3"><?= $rowDetailLang['lang_content_home2'];?></textarea>

							            <p class="titleRightNCP">Dòng 3</p>
							            <textarea name="lang[<?= $lang['languages_code']?>][lang_content_home3]" id="input" class="form-control" rows="3"><?= $rowDetailLang['lang_content_home3'];?></textarea>

							            <p class="titleRightNCP">Dòng 4</p>
							            <input type="text" class="txtNCP1" value="<?= $rowDetailLang['lang_content_home4'];?>" name="lang[<?= $lang['languages_code']?>][lang_content_home4]"/>

							            <p class="titleRightNCP">Dòng 5</p>
							            <textarea name="lang[<?= $lang['languages_code']?>][lang_content_home5]" id="input" class="form-control" rows="3"><?= $rowDetailLang['lang_content_home5'];?></textarea>

							            <p class="titleRightNCP">Dòng 6</p>
							            <input type="text" class="txtNCP1" value="<?= $rowDetailLang['lang_content_home6'];?>" name="lang[<?= $lang['languages_code']?>][lang_content_home6]"/>

							            <p class="titleRightNCP">Dòng 7</p>
							            <textarea name="lang[<?= $lang['languages_code']?>][lang_content_home7]" id="input" class="form-control" rows="3"><?= $rowDetailLang['lang_content_home7'];?></textarea>

							            <p class="titleRightNCP">Dòng 8</p>
							            <input type="text" class="txtNCP1" value="<?= $rowDetailLang['lang_content_home8'];?>" name="lang[<?= $lang['languages_code']?>][lang_content_home8]"/>

							            <p class="titleRightNCP">Dòng 9</p>
							            <input type="text" class="txtNCP1" value="<?= $rowDetailLang['lang_content_home9'];?>" name="lang[<?= $lang['languages_code']?>][lang_content_home9]"/>
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
<form action="" method="post" enctype="multipart/form-data" id="updateConfig">
	<button class="btnAddTop" type="submit" style="position: fixed;top: 0;right: 20px;z-index: 9;<?php echo ($_SESSION['admin_role']==2)?'display: none;':'';?>">Lưu</button>
    <a class="btnAddTop" data-toggle="modal" href='#modal-id' style="position: fixed;top: 0;right: 85px;z-index: 9;<?php echo ($hidden_multi_lang=='hidden')?'display: none;':'';?>">Chỉnh sửa ngôn ngữ</a>
    <input type="hidden" name="action" value="updateConfig">
	<div class="rowNodeContentPage">
    	<div class="leftNCP">
        	<span class="titLeftNCP">Thông tin</span>
            <p class="subLeftNCP">Cung cấp thông tin về tên, mô tả loại sản phẩm và nhà sản xuất để phân loại sản phẩm</p>   
        </div>
        <div class="boxNodeContentPage">
        	<p class="titleRightNCP">Tên website: </p>
            <input type="text" class="txtNCP1" value="<?php echo $row_showMain['lang_web_name']?>" name="web_name"/>

            <p class="titleRightNCP">Keyword</p>
            <input type="text" class="txtNCP1" name="web_keyword" value="<?php echo $row_showMain['lang_web_keyword'];?>" />

            <p class="titleRightNCP">Meta Description: </p>
            <textarea class="longtxtNCP2" name="web_des"><?php echo $row_showMain['lang_web_des'];?></textarea>
            
            <p class="titleRightNCP">Giới thiệu công ty - thay thế vị trí chân trang</p>
            <!-- <input type="text" class="txtNCP1" name="web_email" value="<?php echo $row_showMain['lang_web_email'];?>" /> -->
            <textarea class="longtxtNCP2" name="web_email"><?php echo $row_showMain['lang_web_email'];?></textarea>
        </div>        
    </div><!--end rowNodeContentPage-->
    
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Logo</span>
            <p class="subLeftNCP">Thay logo cho website<br /><br /></p>                         
        </div>
        <div class="boxNodeContentPage">
            <div id="wrapper">
                <input id="fileUpload" type="file" name="fileUpload1"/>
                <br />
                <div id="image-holder">
                <?php 
                    if ($rowConfig['web_logo'] != '') {
                    ?>
                        <img src="../images/<?= $rowConfig['web_logo']?>" class="img-responsive" alt="Image" width="300">
                        <input type="hidden" name="web_logo" value="<?= $rowConfig['web_logo']?>">
                    <?php
                    }
                ?>                
                </div>
            </div>
        </div>
    </div><!--end rowNodeContentPage-->

    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Icon web</span>
            <p class="subLeftNCP">Thay Icon cho website<br /><br /></p>                         
        </div>
        <div class="boxNodeContentPage">
            <div id="wrapper">
                <input id="fileUpload5" type="file" name="fileUpload5"/>
                <br />
                <div id="image-holder">
                <?php 
                    if ($rowConfig['icon_web'] != '') {
                    ?>
                        <img src="../images/<?= $rowConfig['icon_web']?>" class="img-responsive" alt="Image" width="300">
                        <input type="hidden" name="icon_web" value="<?= $rowConfig['icon_web']?>">
                    <?php
                    }
                ?>                
                </div>
            </div>
        </div>
    </div><!--end rowNodeContentPage-->


    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Ảnh SLIDESHOW trang chủ</span>
            <p class="subLeftNCP">Thiết lập ảnh slideshow</p>
        </div>
        <div class="boxNodeContentPage">
            <h3>Ảnh SlideShow trang chủ</h3>
            
            <input type="file" name="fileUpload2" id="fileUpload2">
            <div class="preview2" id="preview2"> 
                <?php
                    $array = json_decode($rowConfig['slideshow_home'], true);
                    foreach ($array as $key => $val) {
                        $img = json_decode($val, true);
                        if ($img != '') {
                            ?>
                                <div class="sub_image_product">
                                    <input type="hidden" name="subImage[]" value="<?= $img['image']?>">
                                    <img src="../images/<?= $img['image']?>" alt="">
                                    <p data-upload-preview="fileUpload2[]-0" style="cursor: pointer;">Xóa ảnh</p>
                                </div>
                            <?php                            
                        }
                    }
                ?>
            </div>
        </div>
    </div><!--end rowNodeContentPage-->


     <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Banner 1</span>
            <p class="subLeftNCP">Thay banner cho website<br /><br /></p>                         
        </div>
        <div class="boxNodeContentPage">
            <div id="wrapper">
                <input id="fileUpload3" type="file" name="fileUpload3"/>
                <br />
                <div id="image-holder">
                <?php 
                    if ($rowConfig['banner1'] != '') {
                    ?>
                        <img src="../images/<?= $rowConfig['banner1']?>" class="img-responsive" alt="Image" width="200">
                        <input type="hidden" name="banner1" value="<?= $rowConfig['banner1']?>">
                    <?php
                    }
                ?>                
                </div>
            </div>
        </div>
    </div>
    <!--end rowNodeContentPage-->

    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Banner 2</span>
            <p class="subLeftNCP">Thay banner cho website<br /><br /></p>                         
        </div>
        <div class="boxNodeContentPage">
            <div id="wrapper">
                <input id="fileUpload4" type="file" name="fileUpload4"/>
                <br />
                <div id="image-holder">
                <?php 
                    if ($rowConfig['banner2'] != '') {
                    ?>
                        <img src="../images/<?= $rowConfig['banner2']?>" class="img-responsive" alt="Image" width="200">
                        <input type="hidden" name="banner2" value="<?= $rowConfig['banner2']?>">
                    <?php
                    }
                ?>                
                </div>
            </div>
        </div>
    </div>
    <!--end rowNodeContentPage-->

    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Banner 3</span>
            <p class="subLeftNCP">Thay banner cho website<br /><br /></p>                         
        </div>
        <div class="boxNodeContentPage">
            <div id="wrapper">
                <input id="fileUpload6" type="file" name="fileUpload6"/>
                <br />
                <div id="image-holder">
                <?php 
                    if ($rowConfig['banner3'] != '') {
                    ?>
                        <img src="../images/<?= $rowConfig['banner3']?>" class="img-responsive" alt="Image" width="200">
                        <input type="hidden" name="banner3" value="<?= $rowConfig['banner3']?>">
                    <?php
                    }
                ?>                
                </div>
            </div>
        </div>
    </div>
    <!--end rowNodeContentPage-->

    <div class="rowNodeContentPage">
    	<div class="leftNCP">
        	<span class="titLeftNCP">Thông tin liên hệ</span>
            <p class="subLeftNCP">Nội dung thông tin liên hệ</p>   
        </div>
        <div class="boxNodeContentPage">

        	<p class="titleRightNCP">Địa chỉ liên hệ 1</p>
            <input type="text" class="txtNCP1" value="<?php echo $row_showMain['lang_content_home1']?>" name="content_home1"/>

            <p class="titleRightNCP">Email liên hệ 1</p>
            <textarea name="content_home2" id="input" class="form-control" rows="3"><?php echo $row_showMain['lang_content_home2']?></textarea>

            <p class="titleRightNCP">Điện thoại liên hệ 1</p>
            <textarea name="content_home3" id="input" class="form-control" rows="3"><?php echo $row_showMain['lang_content_home3']?></textarea>

            <p class="titleRightNCP">Địa chỉ liên hệ 2</p>
            <input type="text" class="txtNCP1" value="<?php echo $row_showMain['lang_content_home4']?>" name="content_home4"/>

            <p class="titleRightNCP">Email liên hệ 2</p>
            <textarea name="content_home5" id="input" class="form-control" rows="3"><?php echo $row_showMain['lang_content_home5']?></textarea>

            <p class="titleRightNCP">Điện thoại liên hệ 2</p>
            <!-- <input type="text" class="txtNCP1" value="<?php echo $row_showMain['lang_content_home6']?>" name="content_home6"/> -->
            <textarea name="content_home6" id="input" class="form-control" rows="3"><?php echo $row_showMain['lang_content_home6']?></textarea>

            <p class="titleRightNCP">Địa chỉ liên hệ 3</p>
            <textarea name="content_home7" id="input" class="form-control" rows="3"><?php echo $row_showMain['lang_content_home7']?></textarea>

            <p class="titleRightNCP">Điện thoại liên hệ 3</p>
            <!-- <input type="text" class="txtNCP1" value="<?php echo $row_showMain['lang_content_home8']?>" name="content_home8"/> -->
            <textarea name="content_home8" id="input" class="form-control" rows="3"><?php echo $row_showMain['lang_content_home8']?></textarea>

            <p class="titleRightNCP">Địa chỉ liên hệ 4</p>
            <input type="text" class="txtNCP1" value="<?php echo $row_showMain['lang_content_home10']?>" name="content_home10"/>

            <p class="titleRightNCP">Điện thoại liên hệ 4</p>
            <!-- <input type="text" class="txtNCP1" value="<?php echo $row_showMain['lang_content_home9']?>" name="content_home9"/> -->
			<textarea name="content_home9" id="input" class="form-control" rows="5"><?php echo $row_showMain['lang_content_home9']?></textarea>
        </div>
    </div><!--end rowNodeContentPage-->
	
    <button type="submit" class="btn btnSave" <?php echo ($_SESSION['admin_role']==2)?'style="display: none;"':'';?> >Lưu</button>
            
</form>
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Truyền Thông Và Công Nghệ GoldBridge Việt Nam</p>       