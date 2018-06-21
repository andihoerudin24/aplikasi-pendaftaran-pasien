<?php

class Pendaftaran extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('Model_pendaftaran');
    }

    function index() {
        $data['daftar'] = $this->db->query("SELECT ts.no_ktp,ts.id_pasien,ts.no_pasien,ts.nama_pasien,ts.alamat,ts.keterangan,ts.tanggal,js.jenis_pasien FROM tbl_pasien as ts, jenis_berobat as js WHERE ts.id_jenis_pasien=js.id")->result();
        $this->template->load('template', 'pendaftaran/list', $data);
    }

    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_pendaftaran->add();
            redirect('Pendaftaran');
        } else {
            $this->template->load('template', 'pendaftaran/list');
        }
    }

    function show_by_id() {
        $id_pasien = $_GET['id_pasien'];
        $sql_pasien = "select * from v_daftar where id_pasien='$id_pasien'";
        $dokter = $this->db->query($sql_pasien)->row_Array();
        $data = array(
            'id_pasien' => $dokter['id_pasien'],
            'nama_pasien' => $dokter['nama_pasien'],
            'alamat' => $dokter['alamat'],
            'jenis_pasien' => $dokter['jenis_pasien'],
            'no_ktp' => $dokter['no_ktp'],
            'keterangan' => $dokter['keterangan'],
        );
        echo json_encode($data);
    }
    
    
    function update(){
        if (isset($_POST['submit'])) {
            $this->Model_pendaftaran->update();
            redirect('Pendaftaran');
        } else {
            $this->template->load('template', 'pendaftaran/list');
            
        }
    }
    
    
    function hapus(){
        $id= $this->uri->segment(3);
        $this->db->where('id_pasien',$id);
        $this->db->delete('tbl_pasien');
        redirect('Pendaftaran');
    }

}
?>

