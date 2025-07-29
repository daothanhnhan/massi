<?php 
    $sidebar_news_new = $action_news->getListNewsNew_hasLimit(4);//var_dump($sidebar_news_new);
?>
<div class="gb-recenpost-sidebar-shophow widget-sidebar">

    <aside class="widget">

        <h3 class="widget-title-sidebar-shophow">Bài viết mới nhất</h3>

        <div class="widget-content">

            <div class="gb-blog-left-recent-posts_shophow">

                <ul>
                    <?php 
                    foreach ($sidebar_news_new as $item) {
                        $rowLang = $action_news->getNewsLangDetail_byId($item['news_id'],$lang);
                    ?>
                    <li>

                        <div class="gb-item-recent-posts_shophow">

                            <div class="gb-item-recent-posts_shophow-img">

                                <a href="/<?= $rowLang['friendly_url'] ?>"><img src="/images/<?= $item['news_img'] ?>" alt="<?= $rowLang['lang_news_name'] ?>"></a>

                            </div>

                            <div class="gb-item-recent-posts_shophow-text">

                                <h2><a href="/<?= $rowLang['friendly_url'] ?>"><?= $rowLang['lang_news_name'] ?></a></h2>

                                <div class="gb-item-recent-post-time_shophow">

                                    <span><i class="fa fa-calendar" aria-hidden="true"></i> <?= substr($item['news_created_date'], 0, 10) ?></span>

                                </div>

                            </div>

                        </div>

                    </li>
                    <?php } ?>
                    

                </ul>

            </div>

        </div>

    </aside>

</div>