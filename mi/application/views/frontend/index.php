<div id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <div class="fill" style="background-image:url('<?php echo base_url() ?>assets/img/depan.jpg');"></div>
            <div class="carousel-caption slide-up">
                <h1 class="banner_heading">We Are <span>Family </span></h1>
                <p class="banner_txt">Together <span><b>we can</b></span>. Temporarily for eternity.</p>
                <div class="<?= "alert alert-" . $ulth['warna'] . " alert-dismissible fade in"; ?>">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?= "<strong>[" . $ulth['tgl'] . "]</strong> " . $ulth['status'] . " " . $ulth['nama']; ?> ulang tahunn!

                </div>
            </div>
        </div>

        <div class="item">
            <div class="fill" style="background-image:url('<?php echo base_url() ?>assets/img/banner-slide-2.jpg');"></div>
            <!-- <div class="carousel-caption slide-up">
                <h1 class="banner_heading">We Are <span>Family </span></h1>
                <p class="banner_txt">Together <span><b>we can</b></span>. Temporarily for eternity.</p>
                <div class="<?= "alert alert-" . $ulth['warna'] . " alert-dismissible fade in"; ?>">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?= "<strong>[" . $ulth['tgl'] . "]</strong> " . $ulth['status'] . " " . $ulth['nama']; ?> ulang tahunn!

                </div>
            </div> -->
        </div>

        <div class="item">
            <div class="fill" style="background-image:url('<?php echo base_url() ?>assets/img/banner-slide-3.jpg');"></div>
            <!-- <div class="carousel-caption slide-up">
                <h1 class="banner_heading">We Are <span>Family </span></h1>
                <p class="banner_txt">Together <span><b>we can</b></span>. Temporarily for eternity.</p>
                <div class="<?= "alert alert-" . $ulth['warna'] . " alert-dismissible fade in"; ?>">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?= "<strong>[" . $ulth['tgl'] . "]</strong> " . $ulth['status'] . " " . $ulth['nama']; ?> ulang tahunn!

                </div>
            </div> -->
        </div>
    </div>

    <!-- Left and right controls -->

    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <i class="fa fa-angle-right" aria-hidden="true"></i>
        <span class="sr-only">Next</span>
    </a>

</div>
<section id="team-member">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 xol-md-12 col-sm-12 col-xs-12">
                <div class="section-heading text-center">
                    <h1>Our <span>Member</span></h1>
                    <p class="subheading">Get Spirit.. Get Revolution.. To Be Success..</p>
                </div>
                <?php foreach ($mhs as $mhs) : ?>

                    <div class="wpb_column vc_column_container col-md-3 col-sm-6 col-xs-6 block mybox">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                                <div class="our-team main-info-below-image">
                                    <div class="our-team-inner">
                                        <div class="our-team-image">
                                            <img src="<?php echo base_url() ?>assets/uploads/image/mahasiswa/<?= $mhs->img; ?>" />
                                            <div class="qodef-circle-animate"></div>
                                            <div class="our-team-position-icon">
                                                <span class="qodef-icon-shortcode circle">
                                                    <i class="qodef-icon-simple-line-icon qodef-icon-element fa fa-cog"></i>
                                                </span>
                                            </div>
                                            <h6 class="q_team_position"><?= dateina($mhs->tgl_lahir); ?></h6>
                                        </div>
                                        <div class="our-team-info">
                                            <div class="our-team-title-holder">
                                                <h5 class="our-team-name"><?= $mhs->nama; ?></h5>
                                            </div>
                                            <div class='our-team-text-inner'>
                                                <div class='our-team-description'>
                                                    <p><?= $mhs->npm; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>