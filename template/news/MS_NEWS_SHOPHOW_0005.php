<?php
    $action = new action();
    $action_service = new action_service();
    if (isset($_GET['slug']) && $_GET['slug'] != '') {
        $slug = $_GET['slug'];

        $rowCatLang = $action_service->getServiceCatLangDetail_byUrl($slug,$lang);
        $rowCat = $action_service->getServiceCatDetail_byId($rowCatLang[$nameColIdServiceCat_serviceCatLanguage],$lang);
        $rows = $action_service->getServiceList_byMultiLevel_orderServiceId($rowCat[$nameColId_serviceCat],'desc',$trang,8,$slug);
    }else{
        $rows = $action->getList($nameTable_service,'','',$nameColId_service,'desc',$trang,6,'dich-vu');
        
    }
?>
<?php include DIR_BREADCRUMBS."MS_BREADCRUMS_RUOUVANG_0001.php";?>
<div class="gb-page-blog_ruouvang">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <?php 
                    $d = 0;
                    foreach ($rows['data'] as $item) {
                        $d++;
                        $rowLang = $action_service->getServiceLangDetail_byId($item['service_id'],$lang); 
                    ?>
                    <div class="col-sm-3">
                        <div class="gb-news-blog_ruouvang-item">
                            <div class="gb-news-blog_ruouvang-item-img">
                                <a href="/<?= $rowLang['friendly_url'] ?>"><img src="/images/<?= $item['service_img'] ?>" alt="<?= $rowLang['lang_service_name'] ?>" class="img-responsive"></a>
                            </div>
                            <div class="gb-news-blog_ruouvang-item-text">
                                <div class="gb-news-blog_ruouvang-item-title">
                                    <h3><a href="/<?= $rowLang['friendly_url'] ?>"><?= $rowLang['lang_service_name'] ?></a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    if ($d%4==0) {
                        echo '<hr style="width:100%;border:0;" />';
                    }
                    } ?>
                </div>
                <div style="text-align: center;"><?= $rows['paging'] ?></div>
            </div>
        </div>
    </div>
</div>