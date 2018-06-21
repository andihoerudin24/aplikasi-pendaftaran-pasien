<?php

Class Model_pendaftaran extends CI_Model {

    function add() {
        $data = array(
            'nama_pasien' => $this->input->post('nama_pasien'),
            'id_jenis_pasien' => $this->input->post('jenis_pasien'),
            'alamat' => $this->input->post('alamat'),
            'no_ktp' => $this->input->post('no_ktp'),
            'keterangan' => $this->input->post('keterangan'),
            'no_pasien'=> no_antrian()
        );
        $this->db->insert('tbl_pasien',$data);
    }
    
    function update(){
        $data = array(
            'nama_pasien' => $this->input->post('nama_pasien'),
            'id_jenis_pasien' => $this->input->post('jenis_pasien'),
            'alamat' => $this->input->post('alamat'),
            'no_ktp' => $this->input->post('no_ktp'),
            'keterangan' => $this->input->post('keterangan'),
        );
        $id_pasien= $this->input->post('id_pasien');
        $this->db->where('id_pasien',$id_pasien);
        $this->db->update('tbl_pasien',$data);
    }

}

?>