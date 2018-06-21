<?php

Class Model_jenis_berobat extends CI_Model {

    function add() {
        $data = array(
            'jenis_pasien'=> $this->input->post('jenis_pasien'),
        );
        $this->db->insert('jenis_berobat',$data);
    }
    
    function update(){
        $data = array(
            'jenis_pasien'=> $this->input->post('jenis_pasien'),
        );
        $id= $this->input->post('id');
        $this->db->where('id',$id);
        $this->db->update('jenis_berobat',$data);
    }

}

?>