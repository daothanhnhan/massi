<?php 
    $action_service = new action_service(); 
    $slug = isset($_GET['slug']) ? $_GET['slug'] : '';

    $rowLang = $action_service->getServiceLangDetail_byUrl($slug,$lang);
    $row = $action_service->getServiceDetail_byId($rowLang['service_id'],$lang);
    $_SESSION['sidebar'] = 'serviceDetail';
?>
<?php include DIR_BREADCRUMBS."MS_BREADCRUMS_RUOUVANG_0001.php";?>
<div class="gb-single-blog_ruouvang">
    <div class="container">
        <div class="row">
            <div class="col-md-12 gb-single-blog_ruouvang-right">
                <div class="gb-single-blog_ruouvang-right-img">
                    <!-- <img src="/images/<?= $row['service_img'] ?>" alt="<?= $rowLang['lang_news_name'] ?>" class="img-responsive"> -->
                </div>
                <div class="gb-single-blog_ruouvang-right-title">
                    <h2><?= $rowLang['lang_service_name'] ?></h2>
                </div>
                
                <div class="gb-single-blog_ruouvang-right-text size-item-detail">
                    <?= $rowLang['lang_service_content'] ?>
                </div>

                

            </div>
        </div>
    </div>
</div>