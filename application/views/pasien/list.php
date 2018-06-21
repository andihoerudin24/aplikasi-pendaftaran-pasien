<div class="panel box-shadow-none content-header">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <span><h3 class="animated fadeInLeft">Tambah Jenis Pasien</h3></span>
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
                <?php echo form_open('Jenis_berobat/add') ?>
                    <div class="row">
                        <div class="col-md-6">
                            <span class="icon-user">Jenis Pasien</span>
                            <input type="text" class="form-control" name="jenis_pasien" placeholder="Nama">
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
                <?php echo form_open('Jenis_berobat/update') ?>
                    <div class="row">
                        <div class="col-md-6">
                            <span class="icon-user">Jenis Pasien</span>
                            <input type="hidden" id="id" name="id">
                            <input type="text" id="jenis_pasien" class="form-control" name="jenis_pasien">
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


<div class="col-md-12 top-20 padding-0">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading"><h3>Data Jenis Berobat</h3></div>
            <div class="panel-body">
                <div class="responsive-table">
                    <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Berobat</th>
                                <th>Aksi Edit</th>
                                <th>Aksi Delete</th>
                             </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                            foreach ($jenis as $row) {
                                echo "
                            <tr>
                                <td>$no</td>
                                <td>$row->jenis_pasien</td>
                                <td><button type='button' class='btn btn-3d btn-danger btn-sm' data-toggle='modal' onclick=show_by_id($row->id) data-target='#Modal'>Edit</button></td>
                                <td>".anchor('Jenis_berobat/Hapus/'.$row->id,'Hapus',array('class' => 'btn btn-3d btn-info btn-sm')) . "</td>
                            </tr>";
                            $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  
</div>
<script type="text/javascript">
 function show_by_id(id) {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>Jenis_berobat/show_by_id',
            data: 'id=' +id,
            success: function (data) {
                var json = data,
                        obj = JSON.parse(json);
                $("#id").val(obj.id);
                $("#jenis_pasien").val(obj.jenis_pasien);
               ;
            }
        })
    }
   
</script>
