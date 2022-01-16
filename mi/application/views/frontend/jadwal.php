<section id="top_banner">
    <div class="banner">
        <div class="inner text-center">
            <h2>Lorem ipsum dolor sit amet</h2>
        </div>
    </div>
    <div class="page_info">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-6">
                    <h4>Jadwal</h4>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6" style="text-align:right;">Home<span class="sep"> / </span><span class="current"> Jadwal</span></div>
            </div>
        </div>
    </div>

    </div>
</section>


<section id="faq">
    <div class="titlebar">
        <div class="container">
            <div class="row">
                <div class="section-heading text-center">
                    <div class="col-md-12 col-xs-12">
                        <h2>Jadwal <span>Kuliah</span></h2>
                        <p class="subheading">Semester <?= $semester->semester; ?></p>
                    </div>
                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="rich-accordian">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Hari</th>
                                    <th scope="col">Nama Mata Kuliah</th>
                                    <th scope="col">Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($jadwal as $u) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= hariapa($u->hari); ?></td>
                                        <td><?= $u->nama; ?></td>
                                        <td><?= $u->waktu_mulai . " - " . $u->waktu_akhir; ?></td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</section>