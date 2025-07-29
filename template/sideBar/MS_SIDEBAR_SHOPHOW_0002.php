<?php 
    $sidebar_news = $action_news->getNewsCat_byNewsCatIdParent(0, 'desc');
?>
<div class="gb-danhmuc-sidebar-shophow widget-sidebar">

    <aside class="widget">

        <h3 class="widget-title-sidebar-shophow">Danh mục tin tức</h3>

        <div class="widget-content">

            <ul>
                <?php 
                foreach ($sidebar_news as $item) {
                    $rowLang = $action_news->getNewsCatLangDetail_byId($item['newscat_id'],$lang); 
                ?>
                <li><a href="/<?= $rowLang['friendly_url'] ?>"><i class="fa fa-angle-right" aria-hidden="true"></i> <?= $rowLang['lang_newscat_name'] ?></a></li>
                <?php } ?>

            </ul>

        </div>

    </aside>

</div>