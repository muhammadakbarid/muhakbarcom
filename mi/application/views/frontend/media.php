<section id="features-page">
    <div class="subsection1">
        <div class="container">
            <div class="section-heading text-center">
                <h1>Kenang-Kenangan <span>D3 MI</span></h1>
                <p class="subheading">dokumentasi foto dan video sejak masuk kampus</p>
            </div>

        </div>
    </div>




    <div class="subsection3" style=" overflow-x:hidden;">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 left-section">

                    <div class="subfeature">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                            <h1><span>Kenang-Kenangan </span>MI.</h1>
                            <div class="row ">
                                <?php $i = 1; ?>
                                <?php foreach ($media as $m) : ?>
                                    <div class="col-md-6 col-sm-12 col-xs-12 " style="margin-bottom: 30px;">
                                        <h4 style="color: aliceblue;"><?= $i . ". " . $m[1];
                                                                        $i++; ?></h4>
                                        <iframe src="https://drive.google.com/file/d/<?= $m[0]; ?>/preview" width="640" height="480"></iframe>
                                    </div>

                                <?php endforeach ?>


                            </div>

                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>


</section>