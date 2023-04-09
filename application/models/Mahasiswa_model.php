<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {

    public function GetMahasiswa(){
    $data=$this->db->query('select * from mahasiswa');
    return $data->result_array();
    }

    public function GetMahasiswaByNim($nim){
        $data = array();
		$this->db->from('mahasiswa');			
		$this->db->where('nim', $nim);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$data = $query->row();
		}
		$query->free_result();  
		return $data;
    }
}