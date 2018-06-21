<?php

Class Jadwal extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('Model_jadwal');
    }

    function index() {
        $data['jadwal'] = $this->db->query("SELECT tj.id_transaksi_jadwal,td.nama_dokter,td.jenis_dokter,tj.keterangan,td.foto,tbj.hari FROM tbl_transaksi_jadwal as tj, tbl_dokter as td, tbl_jadwal as tbj WHERE tj.id_jadwal=tbj.id_jadwal AND tj.id_dokter=td.id_dokter")->result();
        $this->template->load('template', 'jadwal/list', $data);
    }

    function show_by_id() {
        $id_transaksi_jadwal = $_GET['id_transaksi_jadwal'];
        $sql_dokter = "select * from v_jadwal where id_transaksi_jadwal='$id_transaksi_jadwal'";
        $dokter = $this->db->query($sql_dokter)->row_Array();
        $data = array(
            'id_transaksi_jadwal' => $dokter['id_transaksi_jadwal'],
            'nama_dokter' => $dokter['nama_dokter'],
            'hari' => $dokter['hari'],
            'jenis_dokter' => $dokter['jenis_dokter'],
            'keterangan' => $dokter['keterangan'],
            'foto' => $dokter['foto'],
        );
        echo json_encode($data);
    }

    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_jadwal->add();
            redirect('Jadwal');
        } else {
            $this->template->load('template', 'jadwal/list');
        }
    }

    function update() {

        if (isset($_POST['submit'])) {
            $this->Model_jadwal->edit();
            redirect('Jadwal');
        } else {
            $this->template->load('template', 'jadwal/list');
        }
    }

    function Hapus() {
        $id = $this->uri->segment(3);
        $this->db->where('id_transaksi_jadwal', $id);
        $this->db->delete('tbl_transaksi_jadwal');
        redirect('Jadwal');
    }

}

?>