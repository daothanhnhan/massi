<?php 
    $sidebar_procat = $action_product->getProductCat_byProductCatIdParentSort(0, 'asc');
?>
<div class="gb-danhmuc-sidebar-shophow widget-sidebar">

    <aside class="widget">

        <h3 class="widget-title-sidebar-shophow">Danh mục sản phẩm</h3>

        <div class="widget-content">

            <ul>
                <?php 
                foreach ($sidebar_procat as $item) {
                    $row = $item;
                    $rowLang = $action_product->getProductCatLangDetail_byId($item['productcat_id'], $lang); 
                ?>
                <li><a href="/<?= $rowLang['friendly_url'] ?>"><i class="fa fa-angle-right" aria-hidden="true"></i> <?= $rowLang['lang_productcat_name'] ?></a></li>
                <?php } ?>
                

            </ul>

        </div>

    </aside>

</div>