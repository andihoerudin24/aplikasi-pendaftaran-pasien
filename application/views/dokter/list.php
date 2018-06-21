<div class="panel box-shadow-none content-header">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <span><h3 class="animated fadeInLeft">Tambah Dokter</h3></span>
                <p class="animated fadeInDown">
                    <button class="btn btn-circle btn-3d btn-lg btn-primary"  data-toggle="modal" data-target="#exampleModal">
                        <span class="fa fa-paper-plane-o"></span>
                    </button>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Modal for add -->
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
                <?php echo form_open_multipart('Dokter/add') ?>
                <div class="row">
                    <div class="col-md-6">
                        <span class="icon-user">Nama Dokter</span>
                        <input type="text" name="nama_dokter" class="form-control" placeholder="Nama">
                    </div>
                    <div class="col-md-6">
                        <span class="icon-user">Alamat</span>
                        <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-4">
                        <span class="fa fa-caret-square-o-down">Jenis Dokter</span>
                        <select name="jenis" class="form-control">
                            <option value="SPESIALIS">SPESIALIS</option>
                            <option value="KANDUNGAN">KANDUNGAN</option>
                            <option value="GIGI">GIGI</option>
                            <option value="UMUM">UMUM</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <span class="icon-phone">No HP</span>
                        <input type="number" name="no_hp" class="form-control" placeholder="No handphone">
                    </div>

                    <div class="col-md-4">
                        <span class="fa fa-file">Foto</span>
                        <input type="file" name="userfile" class="form-control">
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



<!-- Modal for edit -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Dokter/update') ?>
                <div class="row">
                    <div class="col-md-6">
                        <span class="icon-user">Nama Dokter</span>
                        <input type="hidden" id="id_dokter" name="id_dokter">
                        <input type="text" id="nama_dokter" name="nama_dokter" class="form-control" placeholder="Nama">
                    </div>
                    <div class="col-md-6">
                        <span class="icon-user">Alamat</span>
                        <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat">
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <span class="fa fa-caret-square-o-down">Jenis Dokter</span>
                        <select id="jenis_dokter" name="jenis" class="form-control">
                            <option id="jenis_dokter" value="spesialis">SPESIALIS</option>
                            <option id="jenis_dokter" value="kandungan">KANDUNGAN</option>
                            <option id="jenis_dokter" value="gigi">GIGI</option>
                            <option id="jenis_dokter" value="umum">UMUM</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <span class="icon-phone">No HP</span>
                        <input type="number" id="no_hp" name="no_hp" class="form-control" placeholder="No handphone">
                    </div>

                    <div class="col-md-4">
                        <span class="fa fa-file">Foto</span>
                        <input type="file" id="foto" name="userfile" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Modal for edit -->
<div class="col-md-12 top-20 padding-0">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading"><h3>Data Dokter</h3></div>
            <div class="panel-body">
                <div class="responsive-table">
                    <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Dokter</th>
                                <th>Alamat</th>
                                <th>Jenis Dokter</th>
                                <th>No hp</th>
                                <th>Aksi Edit</th>
                                <th>Aksi Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($dokter as $row)
                                echo "
                             <tr>
                                <td>$no</td>
                                <td>$row->nama_dokter</td>
                                <td>$row->alamat</td>
                                <td>$row->jenis_dokter</td>
                                <td>$row->no_hp</td>
                                <td><button type='button' class='btn btn-3d btn-danger btn-sm' data-toggle='modal' onclick=show_by_id($row->id_dokter) data-target='#Modal'>Edit</button></td>
                                <td>" . anchor('Dokter/Hapus/' . $row->id_dokter, 'Hapus', array('class' => 'btn btn-3d btn-info btn-sm')) . "</td>
                             </tr>";
                            $no++;
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  
</div>
<script type="text/javascript">
    function show_by_id(id_dokter) {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>Dokter/show_by_id',
            data: 'id_dokter=' + id_dokter,
            success: function (data) {
                var json = data,
                        obj = JSON.parse(json);
                $("#id_dokter").val(obj.id_dokter);
                $("#nama_dokter").val(obj.nama_dokter);
                $("#alamat").val(obj.alamat);
                $("#no_hp").val(obj.no_hp);
                $("#foto").val(obj.foto);
                $("#jenis_dokter").val(obj.jenis_dokter);
            }
        })
    }

</script>