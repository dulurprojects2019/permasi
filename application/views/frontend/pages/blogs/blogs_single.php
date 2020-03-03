<?php  
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   

    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];
?>

<!-- ##### Breadcrumb Area Start ##### -->
<?php
foreach($categories as $categ)
{
    $explodeurl = explode('/', $_SERVER['REQUEST_URI']);
    foreach($explodeurl as $expurl)
    {
    if(strtolower($categ['cat_name']) == $expurl)
    { ?>
        <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(<?= base_url() ?>assets/img/blogs/categories/<?= $categ['cat_image'] ?>);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="breadcrumb-content">
                            <h2><?= $blogs['blg_title'] ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php }
    }                                                
}
?>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Breadcrumb Area Start ##### -->
<?php
foreach($categories as $categ)
{
    $explodeurl = explode('/', $_SERVER['REQUEST_URI']);
    foreach($explodeurl as $expurl)
    {
    if(strtolower($categ['cat_name']) == $expurl)
    { ?>
<div class="mag-breadcrumb py-5" style="background-color: <?= $categ['cat_color'] ?>">
    <?php }
    }                                                
}
?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url() ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        <?php $explodeblogscategory = explode(',', $blogs['blg_cat_id']) ?>
                        <?php foreach($explodeblogscategory as $explodeblgcat) : ?>
                        <?php foreach($categories as $cat) : ?>
                        <?php if($cat['cat_id'] == $explodeblgcat ) : ?>
                            <li class="breadcrumb-item"><a href="<?= site_url('category/'.$cat['cat_slug']) ?>"><?= $cat['cat_name'] ?></a></li>
                        <?php endif ?>
                        <?php endforeach ?>
                        <?php endforeach ?>
                        <li class="breadcrumb-item active" aria-current="page"><?= $blogs['blg_title'] ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Post Details Area Start ##### -->
<?php
foreach($categories as $categ)
{
    $explodeurl = explode('/', $_SERVER['REQUEST_URI']);
    foreach($explodeurl as $expurl)
    {
    if(strtolower($categ['cat_name']) == $expurl)
    { ?>
<section class="post-details-area" style="background-color: <?= $categ['cat_color'] ?>">
    <?php }
    }                                                
}
?>
    <div class="container">
        <div class="row justify-content-center">
            <!-- Post Details Content Area -->
            <div class="col-12 col-xl-8">
                <div class="post-details-content bg-white mb-30 p-30 box-shadow">
                    <div class="blog-thumb mb-30">
                        <img src="<?= base_url() ?>assets/img/blogs/<?= $blogs['blg_image'] ?>" alt="">
                    </div>
                    <div class="blog-content">
                        <div class="post-meta">
                            <a href="#"><?= date('M d, Y', strtotime($blogs['blg_created_at'])) ?></a>
                        </div>
                        <h4 class="post-title"><?= $blogs['blg_title'] ?></h4>
                        <!-- Post Meta -->
                        <div class="post-meta-2">
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                        </div>

                        <p><?= $blogs['blg_text_content'] ?></p>

                        <?php if(!empty($blogs['blg_video'])) : ?>
                            <object width="100%" height="350" data="http://www.youtube.com/v/<?= substr($blogs['blg_video'], 32, 50); ?>" type="application/x-shockwave-flash"></object>
                        <?php endif ?>

                        <!-- share facebook -->
                        <div class="like-dislike-share my-5">
                            <a href="<?= $url ?>" class="btnShare facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Share on Facebook</a>
                        </div>
                    </div>
                </div>

                <!-- Comment Area Start -->
                <div class="comment_area clearfix bg-white mb-30 p-30 box-shadow">
                    <!-- Section Title -->
                    <div class="section-heading">
                        <h5>COMMENTS</h5>
                    </div>
                    <div class="fb-comments" data-href="<?= $url; ?>"  data-numposts="5"></div>
                </div>
            </div>

            <!-- Sidebar Widget -->
            <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                <div class="sidebar-area bg-white mb-30 box-shadow">

                    <!-- Sidebar Widget -->
                    <div class="single-sidebar-widget">
                        <?php $i=1; foreach($ads as $advertising) : ?>
                        <?php if($advertising['ads_position'] == 'Right') : ?>
                        <?php $i++; ?>
                        <?php if($advertising['ads_image'] == 'noimageads.png') : ?>
                        <a href="<?= $advertising['ads_link'] ?>" class="add-img">
                            <img src="<?= base_url('assets/img/ads/noimageads/noimageads.png') ?>" alt="">
                        </a>
                        <?php else : ?>
                        <a href="<?= $advertising['ads_link'] ?> " target="_blank" class="add-img">
                            <img src="<?= base_url('assets/img/ads/'.$advertising['ads_image']) ?>" alt="">
                        <?php endif ?>
                        <?php if($i==2) break ?>
                        <?php endif ?>
                        <?php endforeach ?>
                        </a>
                    </div>

                    <!-- Sidebar Widget -->
                    <div class="single-sidebar-widget p-30">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>RELATED POST</h5>
                        </div>
                        <?php
                        foreach($categories as $categ)
                        {
                            $explodeurl = explode('/', $_SERVER['REQUEST_URI']);
                            foreach($explodeurl as $expurl)
                            {
                            if(strtolower($categ['cat_name']) == $expurl)
                            { ?>
                                <?php $i=1; foreach($blogslatest as $blgrelated) : ?>
                                <?php $explodeblogrelated = explode(',', $blgrelated['blg_cat_id']) ?>
                                <?php  foreach($explodeblogrelated as $expblgrltd) : ?>
                                <?php if($categ['cat_id'] == $expblgrltd && $blgrelated['blg_status'] == '1' && $blgrelated['blg_id'] != $blogs['blg_id']) : ?>
                                    <?php $i++;
                                    if($i==12) break ?>
                                    <!-- Single YouTube Channel -->
                                    <div class="single-youtube-channel d-flex">
                                        <div class="youtube-channel-thumbnail">
                                            <?php if($blgrelated['blg_image'] == 'noimageblogs.png') : ?>
                                            <img src="<?= base_url('assets/img/blogs/noimages/noimageblogs.png') ?>" alt="">
                                            <?php else : ?>
                                            <img src="<?= base_url('assets/img/blogs/'.$blgrelated['blg_image']) ?>" alt="">
                                            <?php endif ?>
                                        </div>
                                        <div class="youtube-channel-content">
                                            <a href="<?= site_url('category/'.$categ['cat_slug'].'/'.$blgrelated['blg_slug']) ?>" class="channel-title"><?= $blgrelated['blg_title'] ?></a>
                                        </div>
                                    </div>

                                <?php endif ?>
                                <?php endforeach ?>
                                <?php endforeach ?>

                            <?php }
                            }                                                
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Post Details Area End #####