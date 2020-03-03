<!-- ##### Breadcrumb Area Start ##### -->
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(<?= base_url('assets/img/pages/'.$pagesview['pgs_image']) ?>);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2><?= $pagesview['pgs_name'] ?></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Breadcrumb Area Start ##### -->
<div class="mag-breadcrumb py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $pagesview['pgs_name']?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### About Us Area Start ##### -->
<section class="about-us-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-8">
                <!-- About Us Content -->
                <div class="about-us-content bg-white mb-30 p-30 box-shadow">
                    <!-- Section Title -->
                    <div class="section-heading">
                        <h5><?= $pagesview['pgs_name'] ?></h5>
                    </div>
                    <!-- Google Maps -->
                    <div class="map-area mb-30">
                        <?= $pagesview['pgs_maps_link'] ?>
                    </div>
                    <p><?= $pagesview['pgs_text_content'] ?></p>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                <div class="sidebar-area bg-white mb-30 box-shadow">

                    <!-- Sidebar Widget -->
                    <div class="single-sidebar-widget p-30">
                        <!-- Social Followers Info -->
                        <div class="social-followers-info">
                            <!-- Facebook -->
                            <a href="https://web.facebook.com/yslbaronk" class="facebook-fans"><i class="fa fa-facebook"></i> 4,360 <span>Fans</span></a>
                            <!-- Twitter -->
                            <a href="#" class="twitter-followers"><i class="fa fa-twitter"></i> 3,280 <span>Followers</span></a>
                            <!-- YouTube -->
                            <a href="#" class="youtube-subscribers"><i class="fa fa-youtube"></i> 1250 <span>Subscribers</span></a>
                            <!-- Google -->
                            <a href="#" class="instagram-followers"><i class="fa fa-instagram"></i> 4,230 <span>Followers</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### About Us Area End ##### -->