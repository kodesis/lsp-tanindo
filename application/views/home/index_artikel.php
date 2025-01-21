<link rel="stylesheet" class="artikel-css" href="<?= base_url() ?>assets/artikel/css/bootstrap.min.css">
<link rel="stylesheet" class="artikel-css" href="<?= base_url() ?>assets/artikel/css/owl.carousel.min.css">
<link rel="stylesheet" class="artikel-css" href="<?= base_url() ?>assets/artikel/css/ticker-style.css">
<link rel="stylesheet" class="artikel-css" href="<?= base_url() ?>assets/artikel/css/flaticon.css">
<link rel="stylesheet" class="artikel-css" href="<?= base_url() ?>assets/artikel/css/slicknav.css">
<link rel="stylesheet" class="artikel-css" href="<?= base_url() ?>assets/artikel/css/animate.min.css">
<link rel="stylesheet" class="artikel-css" href="<?= base_url() ?>assets/artikel/css/magnific-popup.css">
<link rel="stylesheet" class="artikel-css" href="<?= base_url() ?>assets/artikel/css/fontawesome-all.min.css">
<link rel="stylesheet" class="artikel-css" href="<?= base_url() ?>assets/artikel/css/themify-icons.css">
<link rel="stylesheet" class="artikel-css" href="<?= base_url() ?>assets/artikel/css/slick.css">
<link rel="stylesheet" class="artikel-css" href="<?= base_url() ?>assets/artikel/css/nice-select.css">
<link rel="stylesheet" class="artikel-css" href="<?= base_url() ?>assets/artikel/css/style.css">
<section class="py-5" id="artikel">
    <!-- Trending Area Start -->
    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <?php
                        if ($artikel_trending_now_1) {
                        ?>
                            <div class="trending-top mb-30">
                                <div class="trend-top-img">
                                    <img src="<?= base_url('uploads/artikel/' . $artikel_trending_now_1->thumbnail) ?>" alt="">
                                    <div class="trend-top-cap">
                                        <!-- <span>Appetizers</span> -->
                                        <h2><a href="<?= base_url('home/artikel_detail/' . $artikel_trending_now_1->Id) ?>"><?= $artikel_trending_now_1->title ?></a></h2>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="trending-top mb-30">
                                <div class="trend-top-img">
                                    <img src="<?= base_url('uploads/artikel/' . $artikel_trending_now_2->thumbnail) ?>" alt="">
                                    <div class="trend-top-cap">
                                        <!-- <span>Appetizers</span> -->
                                        <h2><a href="<?= base_url('home/artikel_detail/' . $artikel_trending_now_2->Id) ?>"><?= $artikel_trending_now_2->title ?></a></h2>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <!-- Trending Bottom -->
                        <div class="trending-bottom">
                            <div class="row">
                                <?php
                                if ($artikel_sub_trending_1) {
                                    foreach ($artikel_sub_trending_1 as $a) {
                                ?>
                                        <div class="col-lg-4">
                                            <div class="single-bottom mb-35">
                                                <div class="trend-bottom-img mb-30">
                                                    <img src="<?= base_url('uploads/artikel/' . $a->thumbnail) ?>" alt="">
                                                </div>
                                                <div class="trend-bottom-cap">
                                                    <!-- <span class="color1">Lifestyple</span> -->
                                                    <h4><a href="<?= base_url('home/artikel_detail/' . $a->Id) ?>"><?= $a->title ?></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <div class="col-lg-4 d-flex justify-content-center align-items-center">
                                        <div class="single-bottom mb-35 text-center">
                                            <div class="trend-bottom-cap">
                                                <h4>Artikel Tidak ada</h4>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- Riht content -->
                    <div class="col-lg-4">
                        <?php
                        if ($artikel_sub_trending_2) {

                            foreach ($artikel_sub_trending_2 as $b) {
                        ?>
                                <div class="trand-right-single d-flex">
                                    <div class="trand-right-img">
                                        <img src="<?= base_url('uploads/artikel/' . $b->thumbnail) ?>" alt="">
                                    </div>
                                    <div class="trand-right-cap">
                                        <!-- <span class="color1">Concert</span> -->
                                        <h4><a href="<?= base_url('home/artikel_detail/' . $b->Id) ?>"><?= $b->title ?></a></h4>
                                    </div>
                                </div>

                            <?php
                            }
                        } else {
                            ?>
                            <div class="trand-right-single d-flex justify-content-center align-items-center" style="height: 100%; min-height: 200px;">
                                <div class="trand-right-cap text-center">
                                    <h4>Artikel Tidak ada</h4>
                                </div>
                            </div>

                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->
    <?php
    if ($artikel_weekly_topnews) {

    ?>
        <!--   Weekly-News start -->
        <div class="weekly-news-area pt-50">
            <div class="container">
                <div class="weekly-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h3>Weekly Top News</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="weekly-news-active dot-style d-flex dot-style">
                                <?php
                                foreach ($artikel_weekly_topnews as $c) {
                                ?>
                                    <div class="weekly-single">
                                        <div class="weekly-img">
                                            <img src="<?= base_url('uploads/artikel/' . $c->thumbnail) ?>" alt="">
                                        </div>
                                        <div class="weekly-caption">
                                            <!-- <span class="color1">Strike</span> -->
                                            <h4><a href="<?= base_url('home/artikel_detail/' . $c->Id) ?>"><?= $c->title ?></a></h4>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <!-- End Weekly-News -->
</section>

<!-- All JS Custom Plugins Link Here here -->
<script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/vendor/jquery-1.12.4.min.js"></script>
<script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/popper.min.js"></script>
<script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/owl.carousel.min.js"></script>
<script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/slick.min.js"></script>
<!-- Date Picker -->
<script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/gijgo.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/wow.min.js"></script>
<script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/animated.headline.js"></script>
<script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/jquery.magnific-popup.js"></script>

<!-- Breaking New Pluging -->
<script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/jquery.ticker.js"></script>
<script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/site.js"></script>

<!-- Scrollup, nice-select, sticky -->
<script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/jquery.scrollUp.min.js"></script>
<script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/jquery.nice-select.min.js"></script>
<script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/jquery.sticky.js"></script>

<!-- contact js -->
<script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/contact.js"></script>
<script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/jquery.form.js"></script>
<script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/jquery.validate.min.js"></script>
<script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/mail-script.js"></script>
<script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/plugins.js"></script>
<script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/main.js"></script>

<!-- <script>
    window.onload = function() {
        // Remove CSS stylesheets
        var stylesheets = document.querySelectorAll('.artikel-css');
        stylesheets.forEach(function(sheet) {
            sheet.parentNode.removeChild(sheet);
        });
        console.log('CSS deleted successfully');

        // Remove JavaScript files
        var scripts = document.querySelectorAll('.artikel_js');
        scripts.forEach(function(script) {
            script.parentNode.removeChild(script);
        });
        console.log('JS deleted successfully');
    }
</script> -->