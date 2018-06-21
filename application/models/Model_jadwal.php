<?php
class Model_jadwal extends CI_Model{
    
    function add(){
        $data=array(
            'id_dokter'=> $this->input->post('nama_dokter'),
            'id_jadwal'=> $this->input->post('hari'),
            'keterangan'=> $this->input->post('keterangan'),
        );
        $this->db->insert('tbl_transaksi_jadwal',$data);
    }
    
    function edit(){
        $data=array(
            'id_dokter'=> $this->input->post('nama_dokter'),
            'id_jadwal'=> $this->input->post('hari'),
            'keterangan'=> $this->input->post('keterangan'),
        );
        $id_transaksi_jadwal= $this->input->post('id_transaksi_jadwal');
        $this->db->where('id_transaksi_jadwal',$id_transaksi_jadwal);
        $this->db->update('tbl_transaksi_jadwal',$data);
    }
}


?>