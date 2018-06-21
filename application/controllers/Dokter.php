<?php

Class Dokter extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('Model_dokter');
    }

    function index() {
        $data['dokter'] = $this->db->get('tbl_dokter')->result();
        $this->template->load('template', 'dokter/list', $data);
    }

    function show_by_id() {
        $id_dokter = $_GET['id_dokter'];
        $sql_dokter = "select * from tbl_dokter where id_dokter='$id_dokter'";
        $dokter = $this->db->query($sql_dokter)->row_Array();
        $data = array(
            'id_dokter' => $dokter['id_dokter'],
            'nama_dokter' => $dokter['nama_dokter'],
            'alamat' => $dokter['alamat'],
            'jenis_dokter' => $dokter['jenis_dokter'],
            'no_hp' => $dokter['no_hp'],
            'foto' => $dokter['foto'],
        );
        echo json_encode($data);
    }

    function add() {
        if (isset($_POST['submit'])) {
            $upload = $this->upload();
            $this->Model_dokter->add($upload);
            redirect('Dokter');
        } else {
            $this->template->load('template', 'dokter/list', $data);
        }
    }

    function upload() {
        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'gif|png|jpg';
        $config['max_size'] = 10000;
        $this->load->library('upload', $config);
        $this->upload->do_upload('userfile');
        $uploads = $this->upload->data();
        return $uploads['file_name'];
    }

    function update() {
        if (isset($_POST['submit'])) {
            $upload = $this->upload();
            $this->Model_dokter->edit($upload);
            redirect('Dokter');
        } else {
            $this->template->load('template', 'dokter/list', $data);
        }
    }

    function Hapus() {
        $id = $this->uri->segment(3);
        $this->db->where('id_dokter', $id);
        $this->db->delete('tbl_dokter');
        redirect('Dokter');
    }

}
?>


