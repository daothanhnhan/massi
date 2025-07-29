<?php 
    $menu_id = isset($_GET['id']) ? $_GET['id'] : '';
    $row = $action->getDetail_New('menu', array('menu_id'), array(&$menu_id), 'i');
    if ($row == '') {
        header('location /index.php?page=trinh-don');
    }
    $menu_type = $action->getList('menu_type','','','menu_type_id','asc','','','');
    $list = $action->getList('menu','','','menu_id','asc','','','');
    $languages = $action->getListLanguages();

    $action_showMain = new action_page('VN');
    $lang_showMain = "vn";
    $row_showMain = $action_showMain->getDetail_New('menu_languages',array('menu_id','languages_code'),array(&$row['menu_id'], &$lang_showMain),'is');

?>
<script>
    function getMenuType(val){
        // alert($(val).val());
        $.ajax({
            url: 'ajax.php?action=getMenuType&menu='+$(val).val(),
            type: 'get',
            success:function(html){
                // alert('1');
                $('.content').html(html);
                $('.select2').select2({
                    width: '100%',
                });
            }
        })
    }
</script>

<form action="" id="updateLangMenu">
    <input type="hidden" name="action" value="updateLangMenu">
    <input type="hidden" name="menu_id" value="<?= $row['menu_id']?>">
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
                                    $rowDetailLang = $action1->getDetail_New('menu_languages',array('menu_id','languages_code'),array(&$row['menu_id'], &$lang['languages_code']),'is');
                                    
                                ?>
                                    <div role="tabpanel" class="tab-pane <?= $key == 0 ? 'active' : ''?>" id="<?= $lang['languages_code']?>">
                                      
                                        <p class="titleRightNCP">Tên menu</p>
                                        <input type="text" class="txtNCP1" value="<?= $rowDetailLang['lang_menu_name'];?>" name="lang[<?= $lang['languages_code']?>][lang_menu_name]"/>
                                        
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

<form action="" method="post" accept-charset="utf-8" id="updateMenu">
    <button class="btnAddTop" type="submit" style="position: fixed;top: 0;right: 220px;z-index: 9;<?php echo ($_SESSION['admin_role']==2)?'display: none;':'';?>">Lưu</button>
    <a class="btnAddTop" data-toggle="modal" href='#modal-id' style="position: fixed;top: 0;right: 285px;z-index: 9;<?php echo ($hidden_multi_lang=='hidden')?'display: none;':'';?>">Chỉnh sửa ngôn ngữ</a>
    <input type="hidden" name="action" value="updateMenu">
    <input type="hidden" name="menu_id" value="<?= $menu_id?>">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung trang</span>
            <p class="subLeftNCP">Nhập tiêu đề và nội dung cho trang</p>      
            
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Tiêu đề</p>
            <input type="text" class="txtNCP1" id="title" onchange="ChangeToSlug()" value="<?= $row_showMain['lang_menu_name'];?>" name="menu_name"/>
            <p class="titleRightNCP">Menu cha</p>
            <select name="menu_parent" id="" class="select2">
                <option value="0" <?= $row['menu_parent'] == 0 ? 'selected' : '' ?> >Cấp 1</option>
                <?php $action->showCategoriesSelect2($list, 'menu_parent', 0, $row['menu_parent'], 'menu_id', 'menu_name', '') ?>
            </select>
            <p class="titleRightNCP">Thứ tự</p>
            <input type="number" class="txtNCP1" value="<?= $row['menu_sort_order'];?>" name="menu_sort_order"/>
            <p class="titleRightNCP">Loại menu</p>
            <select name="menu_type_id" id="" class="select2" onchange="getMenuType(this)">
                <?php 
                    foreach ($menu_type as $key => $val) {
                    ?>
                        <option value="<?= $val['menu_type_id']?>" <?= $val['menu_type_id'] == $row['menu_type_id'] ? 'selected' : '' ?> ><?= $val['menu_type_name']?></option>
                    <?php
                    }
                ?>
            </select>
            <div class="content">
                <?php 
                    switch ($row['menu_type_id']) {
                        case '1':

                            break;

                        case '2':
                            break;

                        case '3':
                            $list = $action->getList('productcat','','','productcat_id','asc','','','');
                            ?>
                                <p class="titleRightNCP">Danh mục sản phẩm</p>
                                <select name="productcat_id" id="" class="select2">
                                    <?php 
                                        $action->showCategoriesSelect2($list, 'productcat_parent', 0, $row['productcat_id'], 'productcat_id', 'productcat_name', '')
                                    ?>
                                </select>
                                <!-- <p class="titleRightNCP">Đường dẫn</p>
                                <input type="text" class="txtNCP1" value="<?= $row['menu_url'];?>" name="menu_url"/> -->
                            <?php
                            break; 
                            
                        case '4':
                            $list = $action->getList('product','','','productcat_id','asc','','','');
                            ?>
                                <p class="titleRightNCP">Sản phẩm</p>
                                <select name="product_id" id="" class="select2">
                                    <?php 
                                        foreach ($list as $key => $value) {
                                        ?>
                                            <option value="<?= $value['product_id']?>" <?= $row['product_id'] == $value['product_id'] ? 'selected' : ''?> ><?= $value['product_name']?></option>
                                        <?php
                                        }
                                    ?>
                                </select>
                                <!-- <p class="titleRightNCP">Đường dẫn</p>
                                <input type="text" class="txtNCP1" value="<?= $row['menu_url'];?>" name="menu_url"/> -->
                            <?php
                            break;
                        

                        case '5':
                            $list = $action->getList('newscat','','','newscat_id','asc','','','');
                            ?>
                                <p class="titleRightNCP">Danh mục tin tức</p>
                                <select name="newscat_id" id="" class="select2">
                                    <?php 
                                        $action->showCategoriesSelect2($list, 'newscat_parent', 0, $row['newscat_id'], 'newscat_id', 'newscat_name', '')
                                    ?>
                                </select>
                                <!-- <p class="titleRightNCP">Đường dẫn</p>
                                <input type="text" class="txtNCP1" value="<?= $row['menu_url'];?>" name="menu_url"/> -->
                            <?php
                            break;    

                        case '6':
                            break;    
                                                    

                        case '7':
                            $list = $action->getList('news','','','news_id','asc','','','');
                            ?>
                                <p class="titleRightNCP">Trang nội dung</p>
                                <select name="news_id" id="" class="select2">
                                    <?php 
                                        foreach ($list as $key => $value) {
                                        ?>
                                            <option value="<?= $value['news_id']?>" <?= $row['news_id'] == $value['news_id'] ? 'selected' : ''?> ><?= $value['news_name']?></option>
                                        <?php
                                        }
                                    ?>
                                </select>
                                <!-- <p class="titleRightNCP">Đường dẫn</p>
                                <input type="text" class="txtNCP1" value="<?= $row['menu_url'];?>" name="menu_url"/> -->
                            <?php
                            break;

                        case '8':
                            ?>
                                <p class="titleRightNCP">Đường dẫn</p>
                                <input type="text" class="txtNCP1" value="<?= $row_showMain['urlFriendly_menu'];?>" name="menu_url"/>
                            <?php
                            break;
                            

                        case '9':
                        	break;

                        case '10':
                        	break;	

                        case '11':
                            $list = $action->getList('service','','','service_id','asc','','','');
                            ?>
                                <p class="titleRightNCP">Trang nội dung</p>
                                <select name="service_id" id="" class="select2">
                                    <?php 
                                        foreach ($list as $key => $value) {
                                        ?>
                                            <option value="<?= $value['service_id']?>" <?= $row['service_id'] == $value['service_id'] ? 'selected' : ''?> ><?= $value['service_name']?></option>
                                        <?php
                                        }
                                    ?>
                                </select>
                                <!-- <p class="titleRightNCP">Đường dẫn</p>
                                <input type="text" class="txtNCP1" value="<?= $row['menu_url'];?>" name="menu_url"/> -->
                            <?php
                            break;    

                        case '12':
                            $list = $action->getList('servicecat','','','servicecat_id','asc','','','');
                            ?>
                                <p class="titleRightNCP">Danh mục dịch vụ</p>
                                <select name="servicecat_id" id="" class="select2">
                                    <?php 
                                        $action->showCategoriesSelect2($list, 'servicecat_parent', 0, $row['servicecat_id'], 'servicecat_id', 'servicecat_name', '')
                                    ?>
                                </select>
                                <!-- <p class="titleRightNCP">Đường dẫn</p>
                                <input type="text" class="txtNCP1" value="<?= $row['menu_url'];?>" name="menu_url"/> -->
                            <?php
                            break;

                       case '13':
                            $list = $action->getList('page','','','page_id','asc','','','');
                            ?>
                                <p class="titleRightNCP">Trang nội dung</p>
                                <select name="page_id" id="" class="select2">
                                    <?php 
                                        foreach ($list as $key => $value) {
                                        ?>
                                            <option value="<?= $value['page_id']?>" <?= $row['page_id'] == $value['page_id'] ? 'selected' : ''?> ><?= $value['page_name']?></option>
                                        <?php
                                        }
                                    ?>
                                </select>
                                <!-- <p class="titleRightNCP">Đường dẫn</p>
                                <input type="text" class="txtNCP1" value="<?= $row['menu_url'];?>" name="menu_url"/> -->
                            <?php
                            break;

                        case '14':
                        	break;

                        case '15':
                        	break;	        
                        
                        default:
                            break;
                    }
                ?>
            </div>

           <!--  <p class="titleRightNCP">Trạng thái hoạt động:</p>
            <div class="checkbox" style="margin-left: 20px;float: left">
                <input type="checkbox" id="state" name="state" class="css-checkbox" checked value="1">
                <label class="css-label" for="state"></label>
            </div> -->
        </div>
    </div><!--end rowNodeContentPage-->

   
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Trạng thái</span>
            <p class="subLeftNCP">Thiết lập chế độ hiển thị cho trang nội dung</p>                
        </div>
        <div class="boxNodeContentPage">
            <label class="selectCate">
                <input type="checkbox" value="1" name="state" <?= ($row['state']==1) ? 'checked' : '' ?> >
                Hoạt động
            </label>
        </div>
    </div><!--end rowNodeContentPage-->
    <button type="submit" class="btn btnSave" <?php echo ($_SESSION['admin_role']==2)?'style="display: none;"':'';?>>Lưu</button>
    <button type="submit" class="btn btnDelete" id="deleteMenu" data-action="deleteMenu" <?php echo ($_SESSION['admin_role']==2)?'style="display: none;"':'';?> data-id="<?= $menu_id?>">Xóa</button>
    
</form>
