<div class="gb-nhan-xet-baiviet">

    <!--NHẬN XÉT HEADER-->
    <div class="gb-nhan-xet-baiviet-header">
        <h3>NHẬN XÉT VỀ BÀI VIẾT</h3>
        <div class="gb-form-nhan-xet">
            <div class="fb-comments" data-href="<?= $action->curPageURL() ?>" data-width="100%" data-numposts="1"></div>
        </div>
    </div>
</div>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>