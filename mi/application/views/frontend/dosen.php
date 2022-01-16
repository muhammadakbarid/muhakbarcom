<section id="top_banner">
    <div class="banner">
        <div class="inner text-center">
            <h2>Dosen Manajemen Informatika</h2>
        </div>
    </div>
    <div class="page_info">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-6">
                    <h4>dosen</h4>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6" style="text-align:right;">Home<span class="sep"> / </span><span class="current">dosen</span></div>
            </div>
        </div>
    </div>

    </div>
</section>


<section id="team-member">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 xol-md-12 col-sm-12 col-xs-12">
                <div class="section-heading text-center">
                    <h1>Our <span>Lecturer</span></h1>
                    <p class="subheading">Get Spirit.. Get Revolution.. To Be Success..</p>
                </div>
                <?php foreach ($dosen as $dosen) : ?>

                    <div class="wpb_column vc_column_container col-md-3 col-sm-6 col-xs-6 block mybox">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                                <div class="our-team main-info-below-image">
                                    <div class="our-team-inner">
                                        <div class="our-team-image">
                                            <img src="<?php echo base_url() ?>assets/uploads/image/dosen/<?= $dosen->img; ?>" />
                                            <div class="qodef-circle-animate"></div>
                                            <div class="our-team-position-icon">
                                                <span class="qodef-icon-shortcode circle">
                                                    <i class="qodef-icon-simple-line-icon qodef-icon-element fa fa-cog"></i>
                                                </span>
                                            </div>
                                            <!-- <h6 class="q_team_position"><?= dateina($dosen->tgl_lahir); ?></h6> -->
                                        </div>
                                        <div class="our-team-info">
                                            <div class="our-team-title-holder">
                                                <h5 class="our-team-name"><?= $dosen->nama; ?></h5>
                                            </div>
                                            <div class='our-team-text-inner'>
                                                <div class='our-team-description'>
                                                    <!-- <p><?= $dosen->npm; ?></p> -->
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