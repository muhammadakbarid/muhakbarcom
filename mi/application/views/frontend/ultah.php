<section id="top_banner">
    <div class="banner">
        <div class="inner text-center">
            <h2>Cie Ultah..</h2>
        </div>
    </div>
    <div class="page_info">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-6">
                    <h4>Ultah</h4>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6" style="text-align:right;">Home<span class="sep"> / </span><span class="current">Ultah</span></div>
            </div>
        </div>
    </div>

    </div>
</section>
<section id="contact-page">
    <div class="container">
        <div class="section-heading text-center">
            <h2>Ulang <span>Tahun</span></h2>
            <p class="subheading">Daftar mahasiswa yang bakal ulang tahun. cie ultah..</p>
        </div>
        <div class="row contact-wrap">
            <div class="status alert alert-success" style="display: none"></div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Kapan?</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($ultah as $u) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $u->nama; ?></td>
                            <td><?= dateIna($u->tgl_lahir); ?></td>
                            <td><?= selisih_hari($u->tgl_lahir) . " hari lagi.."; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>