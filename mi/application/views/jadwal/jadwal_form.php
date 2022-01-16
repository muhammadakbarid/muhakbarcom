<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/dist/css/bootstrap-clockpicker.min.css">
<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button; ?> Jadwal</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="<?php echo $action; ?>" method="post">
                    <div class="form-group">
                        <label for="varchar">Nama Mata Kuliah<?php echo form_error('nama') ?></label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Mata kuliah" value="<?php echo $nama; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="time">Waktu Mulai <?php echo form_error('waktu_mulai') ?></label>
                        <!-- <input type="text" class="form-control" name="waktu_mulai" id="waktu_mulai" placeholder="Waktu Mulai" value="<?php echo $waktu_mulai; ?>" /> -->
                        <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                            <input type="text" name="waktu_mulai" class="form-control" value="<?php echo $waktu_mulai; ?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="time">Waktu Akhir <?php echo form_error('waktu_akhir') ?></label>
                        <!-- <input type="text" class="form-control" name="waktu_akhir" id="waktu_akhir" placeholder="Waktu Akhir" value="<?php echo $waktu_akhir; ?>" /> -->
                        <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                            <input type="text" name="waktu_akhir" class="form-control" value="<?php echo $waktu_akhir; ?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="int">Hari <?php echo form_error('hari') ?></label>
                            <select class="form-control" name="hari" id="hari">
                                <option value="1">Senin</option>
                                <option value="2">Selasa</option>
                                <option value="3">Rabu</option>
                                <option value="4">Kamis</option>
                                <option value="5">Jum'at</option>
                                <option value="6">Sabtu</option>
                                <option value="7">Minggu</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="int">Semester <?php echo form_error('semester') ?></label>
                            <select class="form-control" name="semester" id="semester">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">


                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('jadwal') ?>" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript" src="<?= base_url(); ?>assets/dist/js/bootstrap-clockpicker.min.js"></script>
<script type="text/javascript">
    $('.clockpicker').clockpicker();
</script>