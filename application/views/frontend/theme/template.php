<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?= $title_header ?></title>
    <?php foreach($iconbar as $icon) : ?>
      <link rel="icon" href="<?=base_url()?>assets/img/settings/iconbar/<?=$icon['icb_image']?>">
    <?php endforeach ?>

    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/theme/frontend/style.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Navbar Area -->
        <div class="mag-main-menu" id="sticker">
            <div class="classy-nav-container breakpoint-off">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="magNav">

                    <!-- Nav brand -->
                    <?php foreach($menubar as $mnb) : ?>
                    <?php if($mnb['mnb_image'] == 'nomenubar.png') : ?>
                        <a href="<?= site_url() ?>" class="nav-brand"><img src="<?= base_url() ?>assets/img/settings/menubar/nomenubar/nomenubar.png" alt=""></a>
                    <?php else : ?>
                        <a href="<?= site_url() ?>" class="nav-brand"><img src="<?= base_url() ?>assets/img/settings/menubar/<?= $mnb['mnb_image'] ?>" alt=""></a>
                    <?php endif ?>
                    <?php endforeach ?>
                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Nav Content -->
                    <div class="nav-content d-flex align-items-center">
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li class="active"><a href="<?= site_url() ?>">Home</a></li>
                                    <?php foreach($categories as $category) : ?>
                                        <li><a href="<?= site_url('category/'.$category['cat_slug'].'') ?>"><?= $category['cat_name'] ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <div class="top-meta-data d-flex align-items-center">
                            <!-- Top Search Area -->
                            <div class="top-search-area">
                                <form action="index.html" method="post">
                                    <input type="search" name="top-search" id="topSearch" placeholder="Search and hit enter...">
                                    <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <?= $contentsfrontend; ?>

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget">
                        <div class="social-followers-info">
                            <!-- Facebook -->
                            <a href="https://web.facebook.com/yslbaronk" class="facebook-fans"><i class="fa fa-facebook"></i> <span> Text Here..</span></a>
                            <!-- Twitter -->
                            <a href="#" class="twitter-followers"><i class="fa fa-twitter"></i> <span> Text Here..</span></a>
                            <!-- YouTube -->
                            <a href="#" class="youtube-subscribers"><i class="fa fa-youtube"></i> <span> Text Here..</span></a>
                            <!-- Google -->
                            <a href="#" class="instagram-followers"><i class="fa fa-instagram"></i> <span> Text Here..</span></a>
                        </div>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget">
                        <h6 class="widget-title">About Us</h6>
                        <nav class="footer-widget-nav">
                            <ul>
                                <?php foreach($pages as $pgs) : ?>
                                <li><a href="<?= site_url('pages/'.$pgs['pgs_slug']) ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?= $pgs['pgs_name'] ?></a></li>
                                <?php endforeach ?>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget">
                        <h6 class="widget-title">LATEST BLOGS</h6>
                        <!-- Single Blog Post -->
                        <?php $i=0; foreach($blogslatest as $blglatest) : ?>
                        <?php $explodelatest = explode(',', $blglatest['blg_cat_id']); ?>
                        <?php $a=1; foreach($explodelatest as $expllts) :?>
                        <?php foreach($categories as $cat) : ?>
                        <?php if($cat['cat_id'] == $expllts) : ?>
                        <?php $i++; ?>
                        <div class="single-blog-post style-2 d-flex">
                            <div class="post-thumbnail">
                                <?php if($blglatest['blg_image'] == 'noimageblogs.png') : ?>
                                <img src="<?= base_url('assets/img/blogs/noimages/noimageblogs.png') ?>" alt="">
                                <?php else : ?>
                                <img src="<?= base_url('assets/img/blogs/'.$blglatest['blg_image']) ?>" alt="">
                                <?php endif ?>
                            </div>
                            <div class="post-content">
                                <a href="<?= site_url('category/'.strtolower($cat['cat_name']).'/'.$blglatest['blg_slug']) ?>" class="post-title"><?= $blglatest['blg_title'] ?></a>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php endforeach ?>
                        <?php $a++; if($a==2) break ?>
                        <?php endforeach ?>
                        <?php if($i==2)break?>
                        <?php endforeach?>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget">
                        <h6 class="widget-title">Categories</h6>
                        <ul class="footer-tags">
                            <?php foreach($categories as $category) : ?>
                                <li><a href="<?= site_url('category/'.$category['cat_slug']) ?>"><?= $category['cat_name'] ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copywrite Area -->
        <div class="copywrite-area">
            <div class="container">
                <div class="row">
                    <!-- Copywrite Text -->
                    <div class="col-12 col-sm-6">
                        <p class="copywrite-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> | by <a href="#" target="_blank">DulurProjects</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="<?= base_url() ?>assets/theme/frontend/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?= base_url() ?>assets/theme/frontend/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?= base_url() ?>assets/theme/frontend/js/bootstrap/bootstrap.min.js"></script>
    <!-- bootpage -->
    <script src="<?= base_url() ?>assets/theme/frontend/js/bootstrap/jquery.bootpag.min.js"></script>
    <script src="<?= base_url() ?>assets/theme/frontend/js/bootstrap/jquery.bootpag.js"></script>
    <!-- All Plugins js -->
    <script src="<?= base_url() ?>assets/theme/frontend/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="<?= base_url() ?>assets/theme/frontend/js/active.js"></script>
</body>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v5.0"></script>

<script type="text/javascript">
window.fbAsyncInit = function(){
FB.init({
    appId: 'xxxxx', status: true, cookie: true, xfbml: true }); 
};
(function(d, debug){var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
    if(d.getElementById(id)) {return;}
    js = d.createElement('script'); js.id = id; 
    js.async = true;js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
    ref.parentNode.insertBefore(js, ref);}(document, /*debug*/ false));
function postToFeed(title, desc, url, image){
var obj = {method: 'feed',link: url, picture: 'http://www.url.com/images/'+image,name: title,description: desc};
function callback(response){}
FB.ui(obj, callback);
}
</script>

<script type="text/javascript">
$('.btnShare').click(function(){
elem = $(this);
postToFeed(elem.data('title'), elem.data('desc'), elem.prop('href'), elem.data('image'));

return false;
});
</script>

<script type="text/javascript">
$('.demo4_top,.demo4_bottom').bootpag({
    total: 50,
    page: 2,
    maxVisible: 5,
    leaps: true,
    firstLastUse: true,
    first: '<span aria-hidden="true">&larr;</span>',
    last: '<span aria-hidden="true">&rarr;</span>',
    wrapClass: 'pagination',
    activeClass: 'active',
    disabledClass: 'disabled',
    nextClass: 'next',
    prevClass: 'prev',
    lastClass: 'last',
    firstClass: 'first'
}).on("page", function(event, num){
    $(".content4").html("Page " + num); // or some ajax content loading...
}).find('.pagination');
</script>

</html>