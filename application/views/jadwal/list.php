<div class="panel">
    <div class="panel-body">
        <div class="col-md-12">
            <div class="input-group">
                <input type="text" class="form-control" aria-label="...">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-default" >Pencarian<span class=""></span></button>
                </div><!-- /btn-group -->
                <div class="input-group-btn">
                    <button class="btn ripple-infinite btn-raised btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal2">
                        <div>
                            <span>Tambah Jadwal</span>
                        </div>
                    </button>
                </div><!-- /btn-group -->
            </div><!-- /input-group -->
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="row">
        <?php foreach ($jadwal as $row): ?>

            <div class="col-sm-6 col-md-3 product-grid">
                <div class="thumbnail">
                    <div class="product-price product-price-bottom">
                        <h4>
                            <?php
                            echo $row->hari;
                            echo "<br>";
                            echo "dokter:";
                            echo $row->jenis_dokter;
                            ?></h4>
                    </div>

                    <img src="<?php echo base_url() ?>uploads/<?php echo $row->foto; ?>" alt="...">
                    <div class="caption">
                        <small>Category</small>
                        <small class="pull-right">
                            <span class="rate fa-star fa"></span>
                            <span class="rate fa-star fa"></span>
                            <span class="rate fa-star fa"></span>
                            <span class="rate fa-star fa"></span>
                            <span class="rate fa-star-half fa"></span>
                        </small>
                        <h4><?php echo $row->nama_dokter ?></h4>
                        <p><?php echo $row->keterangan ?></p>
                        <p> 
                            <button class="btn ripple-infinite btn-raised btn-success btn-sm" onclick="show_by_id(<?php echo $row->id_transaksi_jadwal; ?>)" data-toggle="modal" data-target="#exampleModal">
                                <div>
                                    <span>Sesuaikan Jadwal</span>
                                </div>
                            </button>
                        </p>
                        <p> 
                            <?php echo anchor('Jadwal/Hapus/' . $row->id_transaksi_jadwal, 'Hapus', array('class' => 'btn ripple-infinite btn-raised btn-info btn-sm')) ?>   
                        </p>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- end: content -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tamabah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Jadwal/update') ?>
                <div class="row">
                    <div class="col-md-6">
                        <span class="icon-user">Nama Dokter</span>
                        <?php echo cmb_dinamis('nama_dokter','tbl_dokter','nama_dokter','id_dokter',NULL,NULL,"id='nama_dokter' ") ?>
                        <input type="hidden" id="id_transaksi_jadwal" name="id_transaksi_jadwal">
                    </div>
                    <div class="col-md-6">
                        <span class="icon-user">Hari</span>
                        <?php echo cmb_dinamis('hari','tbl_jadwal','hari','id_jadwal',NULL,NULL,"id='hari'") ?>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <span class="fa fa-caret-square-o-down">Jenis Dokter</span>
                        <select id="jenis_dokter" disabled="" name="jenis" class="form-control">
                            <option id="jenis_dokter" value="spesialis">SPESIALIS</option>
                            <option id="jenis_dokter" value="kandungan">KANDUNGAN</option>
                            <option id="jenis_dokter" value="gigi">GIGI</option>
                            <option id="jenis_dokter" value="umum">UMUM</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <span class="fa-star-half">keterangan</span>
                        <textarea class="form-control" name="keterangan" id="keterangan"></textarea> 
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning btn-sm btn-3d" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary btn-sm btn-3d">Save</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Modal for add -->


<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tamabah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Jadwal/add') ?>
                <div class="row">
                    <div class="col-md-6">
                        <span class="icon-user">Nama Dokter</span>
                        <?php echo cmb_dinamis('nama_dokter','tbl_dokter','nama_dokter','id_dokter'); ?>
                    </div>
                    <div class="col-md-6">
                        <span class="icon-user">Hari</span>
                        <?php echo cmb_dinamis('hari','tbl_jadwal','hari','id_jadwal'); ?>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <span class="fa-star-half">keterangan</span>
                        <textarea class="form-control" name="keterangan" id="keterangan"></textarea> 
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning btn-sm btn-3d" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary btn-sm btn-3d">Save</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    function show_by_id(id_transaksi_jadwal) {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>Jadwal/show_by_id',
            data: 'id_transaksi_jadwal=' + id_transaksi_jadwal,
            success: function (data) {
                var json = data,
                        obj = JSON.parse(json);
                $("#id_transaksi_jadwal").val(obj.id_transaksi_jadwal);
                $("#nama_dokter").val(obj.nama_dokter);
                $("#keterangan").val(obj.keterangan);
                $("#hari").val(obj.hari);
                $("#foto").val(obj.foto);
                $("#jenis_dokter").val(obj.jenis_dokter);
            }
        });
    }
</script>

