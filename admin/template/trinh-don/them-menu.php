<?php 

    $menu_type = $action->getList('menu_type','','','menu_type_id','asc','','','');
    $list = $action->getList('menu','','','menu_id','desc','','','');
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
<form action="" method="post" accept-charset="utf-8" id="addMenu">

    <input type="hidden" name="action" value="addMenu">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung trang</span>
            <p class="subLeftNCP">Nhập tiêu đề và nội dung cho trang</p>      
            
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Tiêu đề</p>
            <input type="text" class="txtNCP1" id="title" onchange="ChangeToSlug()" value="<?= $row['menu_name'];?>" name="menu_name"/>
            <p class="titleRightNCP">Menu cha</p>
            <select name="menu_parent" id="" class="select2">
                <option value="0" selected>Cấp 1</option>
                <?php $action->showCategoriesSelect2($list, 'menu_parent', 0, '', 'menu_id', 'menu_name', '') ?>
            </select>
            <p class="titleRightNCP">Thứ tự</p>
            <input type="number" class="txtNCP1" value="<?= $row['menu_sort_order'];?>" name="menu_sort_order"/>
            <p class="titleRightNCP">Loại menu</p>
            <select name="menu_type_id" id="" class="select2" onchange="getMenuType(this)">
                <?php 
                    foreach ($menu_type as $key => $val) {
                    ?>
                        <option value="<?= $val['menu_type_id']?>"><?= $val['menu_type_name']?></option>
                    <?php
                    }
                ?>
            </select>
            <div class="content">
                
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
                <input type="checkbox" value="1" name="state" checked>
                Hoạt động
            </label>
        </div>
    </div><!--end rowNodeContentPage-->
    <button type="submit" class="btn btnSave">Lưu</button>
    
</form>
