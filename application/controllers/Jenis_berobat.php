<?php

Class Jenis_berobat extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('Model_jenis_berobat');
    }

    function index() {
        $data['jenis'] = $this->db->get('jenis_berobat')->result();
        $this->template->load('template', 'pasien/list', $data);
    }

    function show_by_id() {
        $id = $_GET['id'];
        $sql_jenis = "select * from jenis_berobat where id='$id'";
        $jenis = $this->db->query($sql_jenis)->row_Array();
        $data = array(
            'id' => $jenis['id'],
            'jenis_pasien' => $jenis['jenis_pasien']
        );
        echo json_encode($data);
    }

    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_jenis_berobat->add();
            redirect('Jenis_berobat');
        } else {
            $this->template->load('template', 'pasien/list');
        }
    }
    
   function update(){
       if (isset($_POST['submit'])) {
           $this->Model_jenis_berobat->update();
           redirect('jenis_berobat');
       }else{
            $this->template->load('template', 'pasien/list');
       }
           
    }
    
    function Hapus(){
        $id= $this->uri->segment(3);
        $this->db->where('id',$id);
        $this->db->delete('jenis_berobat');
        redirect('Jenis_berobat');
    }

}

?>