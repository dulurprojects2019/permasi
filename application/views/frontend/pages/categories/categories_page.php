<!-- ##### Breadcrumb Area Start ##### -->
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(<?= base_url() ?>assets/img/blogs/categories/<?= $category['cat_image'] ?>);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2><?= $category['cat_name'] ?></h2>
                </div>
            </div>
        </div>
    </div>
</section>
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
                        <li class="breadcrumb-item"><a href="#">Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $category['cat_name'] ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Archive Post Area Start ##### -->
<?php
foreach($categories as $categ)
{
    $explodeurl = explode('/', $_SERVER['REQUEST_URI']);
    foreach($explodeurl as $expurl)
    {
    if(strtolower($categ['cat_name']) == $expurl)
    { ?>
<div class="archive-post-area" style="background-color: <?= $categ['cat_color'] ?>">
    <?php }
    }                                                
}
?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-8">
                <div class="archive-posts-area bg-white p-30 mb-30 box-shadow">

                    <!-- Single Catagory Post -->
                    <?php foreach($blogs as $blog) : ?>
                    <?php $explodecategory = explode(',', $blog['blg_cat_id']) ?>
                    <?php foreach($explodecategory as $explocat) : ?>
                    <?php if($category['cat_id'] == $explocat && $blog['blg_status'] == '1') : ?>
                    <div class="single-catagory-post d-flex flex-wrap">
                        <!-- Thumbnail -->
                    <?php if($blog['blg_image'] == 'noimageblogs.png') : ?>
                        <div class="post-thumbnail bg-img" style="background-image: url(<?= base_url('assets/img/blogs/noimages/noimageblogs.png') ?>);">
                            <a href="<?= site_url('category/'.$category['cat_slug'].'/'.$blog['blg_slug']) ?>" class="video-play"><i class="fa fa-eye"></i></a>
                        </div>
                    <?php else : ?>
                        <div class="post-thumbnail bg-img" style="background-image: url(<?= base_url() ?>assets/img/blogs/<?= $blog['blg_image'] ?>);">
                            <a href="<?= site_url('category/'.$category['cat_slug'].'/'.$blog['blg_slug']) ?>" class="video-play"><i class="fa fa-eye"></i></a>
                        </div>
                    <?php endif ?>

                        <!-- Post Contetnt -->
                        <div class="post-content">
                            <div class="post-meta">
                                <a href="#"><?= date('M d, Y', strtotime($blog['blg_created_at'])) ?></a>
                                <a href="<?= site_url('category/'.$category['cat_slug']) ?>"><?= $category['cat_name'] ?></a>
                            </div>
                            <a href="<?= site_url('category/'.$category['cat_slug'].'/'.$blog['blg_slug']) ?>" class="post-title"><?= $blog['blg_title'] ?></a>
                            <!-- Post Meta -->
                            <div class="post-meta-2">
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                            </div>
                            <p>
                            	<?= substr($blog['blg_text_content'], 0, 70) ?> ..
                            </p>
                        </div>
                    </div>
                	<?php endif ?>
                	<?php endforeach ?>
                	<?php endforeach ?>

                    <!-- Pagination -->
                    <!-- <nav>
                        <ul class="pagination">
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-right"></i></a></li>
                        </ul>
                    </nav> -->

                </div>
            </div>

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
            </div>
        </div>
    </div>
</div>
<!-- ##### Archive Post Area End #####