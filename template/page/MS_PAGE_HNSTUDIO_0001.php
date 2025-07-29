<?php 
     $action_page = new action_page(); 
    $slug = isset($_GET['slug']) ? $_GET['slug'] : '';

    $rowLang = $action_page->getPageLangDetail_byUrl($slug,$lang);
    $row = $action_page->getPageDetail_byId($rowLang['news_id'],$lang);
    $_SESSION['sidebar'] = 'pageDetail';
?>
<div class="gb-page-gioithieu">
    <?php include DIR_BREADCRUMBS."MS_BREADCRUMS_HNSTUDIO_0001.php";?>
    <div class="container">
        <div class="gb-page-gioithieu-right">
            <h2 style="font-size: 2em;"><?= $rowLang['lang_page_name'] ?></h2>
            <?= $rowLang['lang_page_content'] ?>
        </div>
    </div>
</div>