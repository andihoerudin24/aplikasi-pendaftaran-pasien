<?php

function cmb_dinamis($name, $table, $field, $pk, $selected = NULL, $extra = NULL) {
    $ci = &get_instance();
    $cmb = "<select name='$name' class='form-control' $extra>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $row){
        $cmb .= "<option value='" . $row->$pk . "'";
        $cmb .= $selected == $row->$pk ? 'selected' : '';
        $cmb .= ">" . $row->$field . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}

function chek_seesion(){
    $ci=&get_instance();
    $session=$ci->session->userdata('status_login');
    if($session!='ok') {
        redirect('Auth');
    }
}



function no_antrian() {
    $ci = &get_instance();
    $chek = $ci->db->query("select no_pasien from tbl_pasien order by no_pasien DESC");
    if ($chek->num_rows() > 0) {
        $chek=$chek->row_array();
        $laskode = $chek['no_pasien'];
        $ambil = substr($laskode, 2, 3) + 1;
        $newcode = "AR" . sprintf("%03s", $ambil);
        return $newcode;
    }else{
        return 'AR001';  
    }
}

?>