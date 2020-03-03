<!-- ##### Hero Area Start ##### -->
<div class="hero-area owl-carousel">
    <!-- Single Blog Post -->
<?php $i=0; foreach($blogslatest as $slide) : ?>
<?php $explodeslide = explode(',', $slide['blg_cat_id']); ?>
<?php $a=1; foreach($explodeslide as $explslide) :?>
<?php foreach($categories as $cat) : ?>
<?php if($cat['cat_id'] == $explslide) : ?>
<?php if($slide['blg_view_id'] == 'Slide') : ?>
<?php $i++; ?>
<?php if($slide['blg_image'] == 'noimageblogs.png') :?>
    <div class="hero-blog-post bg-img bg-overlay" style="background-image: url(<?= base_url('assets/img/blogs/noimages/noslide.jpg') ?>);">
<?php else : ?>
    <div class="hero-blog-post bg-img bg-overlay" style="background-image: url(<?= base_url('assets/img/blogs/'.$slide['blg_image']) ?>);">
<?php endif ?>
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Post Contetnt -->
                    <div class="post-content text-center">
                        <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                            <a href="#"><?= date('M d, Y', strtotime($slide['blg_created_at'])) ?>/a>
                        </div>
                        <a href="<?= site_url('category/'.strtolower($cat['cat_name']).'/'.$slide['blg_slug']) ?>" class="post-title" data-animation="fadeInUp" data-delay="300ms"><?= $slide['blg_title'] ?></a>
                        <?php if(!empty($slide['blg_video'])) : ?>
                        <a href="<?= site_url('category/'.strtolower($cat['cat_name']).'/'.$slide['blg_slug']) ?>" class="video-play" data-animation="bounceIn" data-delay="500ms"><i class="fa fa-play"></i></a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>
<?php endif ?>
<?php endforeach ?>
<?php $a++; if($a==2) break ?>
<?php endforeach ?>
<?php if($i == 5)break ?>
<?php endforeach ?>

</div>
<!-- ##### Hero Area End ##### -->

<!-- ##### Mag Posts Area Start ##### -->
<section class="mag-posts-area d-flex flex-wrap">

    <!-- >>>>>>>>>>>>>>>>>>>>
     Post Left Sidebar Area
    <<<<<<<<<<<<<<<<<<<<< -->
    <div class="post-sidebar-area left-sidebar mt-30 mb-30 bg-white box-shadow">
        <!-- Sidebar Widget -->
        <div class="single-sidebar-widget p-30">
            <!-- Section Title -->
            <div class="section-heading">
                <h5>Most Popular</h5>
            </div>

            <!-- Single Blog Post -->
            <?php $i=0; foreach($blogslatest as $mostpopular) : ?>
            <?php $explodemostpopular = explode(',', $mostpopular['blg_cat_id']); ?>
            <?php $a=1; foreach($explodemostpopular as $explpplr) :?>
            <?php foreach($categories as $cat) : ?>
            <?php if($cat['cat_id'] == $explpplr) : ?>
            <?php if($mostpopular['blg_view_id'] == 'Most_Popular') : ?>
            <?php $i++; ?>
            <div class="single-blog-post d-flex">
                <div class="post-thumbnail">
                    <?php if($mostpopular['blg_image'] == 'noimageblogs.png') : ?>
                    <img src="<?= base_url('assets/img/blogs/noimages/noimageblogs.png') ?>" alt="">
                    <?php else : ?>
                    <img src="<?= base_url('assets/img/blogs/'.$mostpopular['blg_image']) ?>" alt="">
                    <?php endif ?>
                </div>
                <div class="post-content">
                    <a href="<?= site_url('category/'.strtolower($cat['cat_name']).'/'.$mostpopular['blg_slug']) ?>" class="post-title"><?= $mostpopular['blg_title'] ?></a>
                </div>
            </div>
            <?php endif ?>
            <?php endif ?>
            <?php endforeach ?>
            <?php $a++; if($a==2) break ?>
            <?php endforeach ?>
            <?php if($i == 4)break ?>
            <?php endforeach ?>
        </div>

        <!-- Sidebar Widget -->
        <div class="single-sidebar-widget">
            <?php $i=1; foreach($ads as $advertising) : ?>
            <?php if($advertising['ads_position'] == 'Left') : ?>
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

            <!-- Single Blog Post -->
            <?php $i=0; foreach($blogslatest as $mostpopular2) : ?>
            <?php $explodemostpopular2 = explode(',', $mostpopular2['blg_cat_id']); ?>
            <?php $a=1; foreach($explodemostpopular2 as $explpplr2) :?>
            <?php foreach($categories as $cat) : ?>
            <?php if($cat['cat_id'] == $explpplr2) : ?>
            <?php if($mostpopular2['blg_view_id'] == 'Most_Popular') : ?>
            <?php
                $i++;
                if($i == 1)continue;
                if($i == 2)continue;
                if($i == 3)continue;
                if($i == 4)continue;
            ?>
            <div class="single-blog-post d-flex">
                <div class="post-thumbnail">
                    <?php if($mostpopular2['blg_image'] == 'noimageblogs.png') : ?>
                    <img src="<?= base_url('assets/img/blogs/noimages/noimageblogs.png') ?>" alt="">
                    <?php else : ?>
                    <img src="<?= base_url('assets/img/blogs/'.$mostpopular2['blg_image']) ?>" alt="">
                    <?php endif ?>
                </div>
                <div class="post-content">
                    <a href="<?= site_url('category/'.strtolower($cat['cat_name']).'/'.$mostpopular2['blg_slug']) ?>" class="post-title"><?= $mostpopular2['blg_title'] ?></a>
                </div>
            </div>
            <?php endif ?>
            <?php endif ?>
            <?php endforeach ?>
            <?php $a++; if($a==2) break ?>
            <?php endforeach ?>
            <?php if($i == 12)break ?>
            <?php endforeach ?>

        </div>
    </div>

    <!-- >>>>>>>>>>>>>>>>>>>>
         Main Posts Area
    <<<<<<<<<<<<<<<<<<<<< -->
    <div class="mag-posts-content mt-30 mb-30 p-30 box-shadow">
        <!-- Trending Now Posts Area -->
        <div class="trending-now-posts mb-30">
            <!-- Section Title -->
            <div class="section-heading">
                <h5>TRENDING NOW</h5>
            </div>

            <div class="trending-post-slides owl-carousel">
                <!-- Single Trending Post -->
                <?php $i=0; foreach($blogslatest as $trending) : ?>
                <?php $exploderending = explode(',', $trending['blg_cat_id']); ?>
                <?php $a=1; foreach($exploderending as $expltrnd) :?>
                <?php foreach($categories as $cat) : ?>
                <?php if($cat['cat_id'] == $expltrnd) : ?>
                <?php if($trending['blg_view_id'] == 'Trending_Now') : ?>
                <?php $i++; ?>
                <div class="single-trending-post">
                    <?php if($trending['blg_image'] == 'noimageblogs.png') : ?>
                    <img src="<?= base_url('assets/img/blogs/noimages/noimageblogs.png') ?>" alt="">
                    <?php else : ?>
                    <img src="<?= base_url('assets/img/blogs/'.$trending['blg_image']) ?>" alt="">
                    <?php endif ?>
                    <div class="post-content">
                        <a href="<?= site_url('category/'.strtolower($cat['cat_name']).'/'.$trending['blg_slug']) ?>" class="post-title"><?= $trending['blg_title'] ?></a>
                    </div>
                </div>
                <?php endif ?>
                <?php endif ?>
                <?php endforeach ?>
                <?php $a++; if($a==2) break ?>
                <?php endforeach ?>
                <?php if($i == 5) break ?>
                <?php endforeach ?>
            </div>
        </div>

        <!-- Feature Video Posts Area -->
        <div class="feature-video-posts mb-30">
            <!-- Section Title -->
            <div class="section-heading">
                <h5>Featured</h5>
            </div>

            <div class="featured-video-posts">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <!-- Single Featured Post -->
                        <?php $i=0; foreach($blogslatest as $featured) : ?>
                        <?php $explodefeatured = explode(',', $featured['blg_cat_id']); ?>
                        <?php $a=1; foreach($explodefeatured as $explftrd) :?>
                        <?php foreach($categories as $cat) : ?>
                        <?php if($cat['cat_id'] == $explftrd) : ?>
                        <?php if($featured['blg_view_id'] == 'Featured') : ?>
                        <?php $i++ ?>
                        <div class="single-featured-post">
                            <!-- Thumbnail -->
                            <div class="post-thumbnail mb-50">
                                <?php if($featured['blg_image'] == 'noimageblogs.png') : ?>
                                <img src="<?= base_url('assets/img/blogs/noimages/noimageblogs.png') ?>" alt="">
                                <?php else : ?>
                                <img src="<?= base_url('assets/img/blogs/'.$featured['blg_image']) ?>" alt="">
                                <?php endif ?>
                                <a href="<?= site_url('category/'.strtolower($cat['cat_name']).'/'.$featured['blg_slug']) ?>" class="video-play"><i class="fa fa-play"></i></a>
                            </div>
                            <!-- Post Contetnt -->
                            <div class="post-content">
                                <div class="post-meta">
                                    <a href="#"><?= date('M d, Y', strtotime($featured['blg_created_at'])) ?></a>
                                </div>
                                <a href="<?= site_url('category/'.strtolower($cat['cat_name']).'/'.$featured['blg_slug']) ?>" class="post-title"><?= $featured['blg_title'] ?></a>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php endif ?>
                        <?php endforeach ?>
                        <?php $a++; if($a==2) break ?>
                        <?php endforeach ?>
                        <?php if($i==1) break ?>
                        <?php endforeach ?>
                    </div>

                    <div class="col-12 col-lg-5">
                        <!-- Featured Video Posts Slide -->
                        <div class="featured-video-posts-slide owl-carousel">

                            <div class="single--slide">
                                <!-- Single Blog Post -->
                                <?php $i=0; foreach($blogslatest as $featured2) : ?>
                                <?php $explodefeatured2 = explode(',', $featured2['blg_cat_id']); ?>
                                <?php $a=1; foreach($explodefeatured2 as $explftrd2) :?>
                                <?php foreach($categories as $cat) : ?>
                                <?php if($cat['cat_id'] == $explftrd2) : ?>
                                <?php if($featured2['blg_view_id'] == 'Featured') : ?>
                                <?php $i++; if($i == 1)continue;?>
                                <div class="single-blog-post d-flex style-3">
                                    <div class="post-thumbnail">
                                        <?php if($featured2['blg_image'] == 'noimageblogs.png') : ?>
                                        <img src="<?= base_url('assets/img/blogs/noimages/noimageblogs.png') ?>" alt="">
                                        <?php else : ?>
                                        <img src="<?= base_url('assets/img/blogs/'.$featured2['blg_image']) ?>" alt="">
                                        <?php endif ?>
                                    </div>
                                    <div class="post-content">
                                        <a href="<?= site_url('category/'.strtolower($cat['cat_name']).'/'.$featured2['blg_slug']) ?>" class="post-title"><?= $featured2['blg_title'] ?></a>
                                    </div>
                                </div>
                                <?php endif ?>
                                <?php endif ?>
                                <?php endforeach ?>
                                <?php $a++; if($a==2) break ?>
                                <?php endforeach ?>
                                <?php if($i == 5) break; ?>
                                <?php endforeach ?>

                            </div>

                            <div class="single--slide">
                                <!-- Single Blog Post -->
                                <?php $i=0; foreach($blogslatest as $featured3) : ?>
                                <?php $explodefeatured3 = explode(',', $featured3['blg_cat_id']); ?>
                                <?php $a=1; foreach($explodefeatured3 as $explftrd3) :?>
                                <?php foreach($categories as $cat) : ?>
                                <?php if($cat['cat_id'] == $explftrd3) : ?>
                                <?php if($featured3['blg_view_id'] == 'Featured') : ?>
                                <?php
                                    $i++;
                                    if($i == 1)continue;
                                    if($i == 2)continue;
                                    if($i == 3)continue;
                                    if($i == 4)continue;
                                    if($i == 5)continue;
                                ?>
                                <div class="single-blog-post d-flex style-3">
                                    <div class="post-thumbnail">
                                        <?php if($featured3['blg_image'] == 'noimageblogs.png') : ?>
                                        <img src="<?= base_url('assets/img/blogs/noimages/noimageblogs.png') ?>" alt="">
                                        <?php else : ?>
                                        <img src="<?= base_url('assets/img/blogs/'.$featured3['blg_image']) ?>" alt="">
                                        <?php endif ?>
                                    </div>
                                    <div class="post-content">
                                        <a href="<?= site_url('category/'.strtolower($cat['cat_name']).'/'.$featured3['blg_slug']) ?>" class="post-title"><?= $featured3['blg_title'] ?></a>
                                    </div>
                                </div>
                                <?php endif ?>
                                <?php endif ?>
                                <?php endforeach ?>
                                <?php $a++; if($a==2) break ?>
                                <?php endforeach ?>
                                <?php if($i==10)break ?>
                                <?php endforeach ?>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- Most Viewed Videos -->
        <div class="most-viewed-videos mb-30">
            <!-- Section Title -->
            <div class="section-heading">
                <h5>Video Tips</h5>
            </div>

            <div class="most-viewed-videos-slide owl-carousel">

                <!-- Single Blog Post -->
                <?php $i=0; foreach($blogslatest as $videotips) : ?>
                <?php $explodevideotips = explode(',', $videotips['blg_cat_id']); ?>
                <?php $a=1; foreach($explodevideotips as $explvidtips) :?>
                <?php foreach($categories as $cat) : ?>
                <?php if($cat['cat_id'] == $explvidtips) : ?>
                <?php if($videotips['blg_view_id'] == 'Video_Tips') : ?>
                <?php $i++ ?>
                <div class="single-blog-post style-4">
                    <div class="post-thumbnail">
                        <?php if($videotips['blg_image'] == 'noimageblogs.png') : ?>
                        <img src="<?= base_url('assets/img/blogs/noimages/noimageblogs.png') ?>" alt="">
                        <?php else : ?>
                        <img src="<?= base_url('assets/img/blogs/'.$videotips['blg_image']) ?>" alt="">
                        <?php endif ?>
                        <a href="<?= site_url('category/'.strtolower($cat['cat_name']).'/'.$videotips['blg_slug']) ?>" class="video-play"><i class="fa fa-play"></i></a>
                        <span class="video-duration"><?= $videotips['blg_title'] ?></span>
                    </div>
                </div>
                <?php endif ?>
                <?php endif ?>
                <?php endforeach ?>
                <?php $a++; if($a==2) break ?>
                <?php endforeach ?>
                <?php if($i==5)break ?>
                <?php endforeach ?>

            </div>
        </div>

        <!-- Sports Videos -->
        <div class="sports-videos-area">
            <!-- Section Title -->
            <div class="section-heading">
                <h5>Video Review</h5>
            </div>

            <div class="sports-videos-slides owl-carousel mb-30">
                <!-- Single Featured Post -->
                <?php $i=0; foreach($blogslatest as $videoreview) : ?>
                <?php $explodevidrev = explode(',', $videoreview['blg_cat_id']); ?>
                <?php $a=1; foreach($explodevidrev as $explvidrev) :?>
                <?php foreach($categories as $cat) : ?>
                <?php if($cat['cat_id'] == $explvidrev) : ?>
                <?php if($videoreview['blg_view_id'] == 'Video_Review') : ?>
                <?php $i++; ?>
                <div class="single-featured-post">
                    <!-- Thumbnail -->
                    <div class="post-thumbnail mb-50">
                        <?php if($videoreview['blg_image'] == 'noimageblogs.png') : ?>
                        <img src="<?= base_url('assets/img/blogs/noimages/noimageblogs.png') ?>" alt="">
                        <?php else : ?>
                        <img src="<?= base_url('assets/img/blogs/'.$videoreview['blg_image']) ?>" alt="">
                        <?php endif ?>
                        <a href="<?= site_url('category/'.strtolower($cat['cat_name']).'/'.$videoreview['blg_slug']) ?>" class="video-play"><i class="fa fa-play"></i></a>
                    </div>
                    <!-- Post Contetnt -->
                    
                    <div class="post-content">
                        <div class="post-meta">
                            <a href="<?= site_url('category/'.strtolower($cat['cat_name']).'/'.$videoreview['blg_slug']) ?>"><?= date('M d, Y', strtotime($videoreview['blg_created_at'])) ?></a>
                        </div>
                        <a href="<?= site_url('category/'.strtolower($cat['cat_name']).'/'.$videoreview['blg_slug']) ?>" class="post-title"><?= $videoreview['blg_title'] ?></a>
                    </div>
                </div>
                <?php endif ?>
                <?php endif ?>
                <?php endforeach ?>
                <?php $a++; if($a==2) break ?>
                <?php endforeach ?>
                <?php if($i==3)break?>
                <?php endforeach ?>

            </div>

            <div class="row">
                <!-- Single Blog Post -->
                <?php $i=0; foreach($blogslatest as $videoreviewlist) : ?>
                <?php $explodevidrev = explode(',', $videoreviewlist['blg_cat_id']); ?>
                <?php $a=1; foreach($explodevidrev as $explvidrev) :?>
                <?php foreach($categories as $cat) : ?>
                <?php if($cat['cat_id'] == $explvidrev) : ?>
                <?php if($videoreviewlist['blg_view_id'] == 'Video_Review') : ?>
                <?php
                    $i++;
                    if($i==1)continue;
                    if($i==2)continue;
                    if($i==3)continue;
                ?>
                <div class="col-12 col-lg-6">
                    <div class="single-blog-post d-flex style-3 mb-30">
                        <div class="post-thumbnail">
                            <?php if($videoreviewlist['blg_image'] == 'noimageblogs.png') : ?>
                            <img src="<?= base_url('assets/img/blogs/noimages/noimageblogs.png') ?>" alt="">
                            <?php else : ?>
                            <img src="<?= base_url('assets/img/blogs/'.$videoreviewlist['blg_image']) ?>" alt="">
                            <?php endif ?>
                        </div>
                        <div class="post-content">
                            <a href="<?= site_url('category/'.strtolower($cat['cat_name']).'/'.$videoreviewlist['blg_slug']) ?>" class="post-title"><?= $videoreviewlist['blg_title'] ?></a>
                        </div>
                    </div>
                </div>
                <?php endif ?>
                <?php endif ?>
                <?php endforeach ?>
                <?php $a++; if($a==2) break ?>
                <?php endforeach ?>
                <?php if($i==7)break ?>
                <?php endforeach ?>

            </div>

        </div>
    </div>

    <!-- >>>>>>>>>>>>>>>>>>>>
     Post Right Sidebar Area
    <<<<<<<<<<<<<<<<<<<<< -->
    <div class="post-sidebar-area right-sidebar mt-30 mb-30 box-shadow">

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
                <h5>Latest Blogs</h5>
            </div>

            <!-- Single YouTube Channel -->
            <?php $i=0; foreach($blogslatest as $blglatest) : ?>
            <?php $explodelatest = explode(',', $blglatest['blg_cat_id']); ?>
            <?php $a=1; foreach($explodelatest as $expllts) :?>
            <?php foreach($categories as $cat) : ?>
            <?php if($cat['cat_id'] == $expllts) : ?>
            <?php $i++; ?>
            <div class="single-youtube-channel d-flex">
                <div class="youtube-channel-thumbnail">
                    <?php if($blglatest['blg_image'] == 'noimageblogs.png') : ?>
                    <img src="<?= base_url('assets/img/blogs/noimages/noimageblogs.png') ?>" alt="">
                    <?php else : ?>
                    <img src="<?= base_url('assets/img/blogs/'.$blglatest['blg_image']) ?>" alt="">
                    <?php endif ?>
                </div>
                <div class="youtube-channel-content">
                    <a href="<?= site_url('category/'.strtolower($cat['cat_name']).'/'.$blglatest['blg_slug']) ?>" class="channel-title"><?= $blglatest['blg_title'] ?></a>
                </div>
            </div>
            <?php endif ?>
            <?php endforeach ?>
            <?php $a++; if($a==2) break ?>
            <?php endforeach ?>
            <?php if($i==10)break?>
            <?php endforeach?>

        </div>

        <!-- Sidebar Widget -->
        <div class="single-sidebar-widget p-30">
            <!-- Section Title -->
            <div class="section-heading">
                <h5>Categories</h5>
            </div>

            <!-- Catagory Widget -->
            <ul class="catagory-widgets">
                <?php foreach($categories as $cat) : ?>
                <li><a href="<?= site_url('category/'.$cat['cat_slug'].'') ?>"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?= $cat['cat_name'] ?></span>
                    <span>
                        <?= $this->global_m->count($cat['cat_id']) ?>
                    </span></a></li>
                <?php endforeach ?>
            </ul>
        </div>

    </div>
</section>
<!-- ##### Mag Posts Area End ##### -->