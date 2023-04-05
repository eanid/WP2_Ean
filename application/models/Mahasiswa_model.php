<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {

    public function GetMahasiswa(){
    $data=$this->db->query('select * from mahasiswa');
    return $data->result_array();
    }

    public function GetMahasiswaByNim($nim){
    $data = $this->db->get_where('mahasiswa', array('nim' => $nim));
    return $data->result_array();
    }
}
