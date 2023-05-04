<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task_bsi_model extends CI_Model
{

    public function GetMahasiswa()
    {
        $this->db->from('mahasiswa');
        $this->db->join('mahasiswa_class','mahasiswa.class = mahasiswa_class.id','LEFT');
        $data = $this->db->get();
        return $data->result_array();
    }
    public function GetMahasiswaByNim($nim)
    {
        $data = array();
        $this->db->from('mahasiswa');
        $this->db->where('nim', $nim);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row();
        }
        $query->free_result();
        return $data;
    }
    public function SaveMahasiswa()
    {
        $data = array(
            "name" => $this->input->post('name'),
            "nim" => $this->input->post('nim'),
            "class" => $this->input->post('class'),
        );
        return $this->db->insert('mahasiswa', $data);
    }
    public function UpdateMahasiswa()
    {
        $data = array(
            "name" => $this->input->post('name'),
            "nim" => $this->input->post('nim'),
            "class" => $this->input->post('class'),
        );
        return $this->db->update('mahasiswa', $data, array('id' => $this->input->post('id')));
    }
    public function DeleteMahasiswa($id)
    {
        return $this->db->delete('mahasiswa', array("id" => $id));
    }
    public function GetClass()
    {
        $this->db->from('mahasiswa_class');
        $data = $this->db->get();
        return $data->result_array();
    }
    public function SaveClass()
    {
        $data = array(
            "class_name" => $this->input->post('class_name'),
            "class_description" => $this->input->post('class_description'),
            "semester" => $this->input->post('semester'),
        );
        return $this->db->insert('mahasiswa_class', $data);
    }
    public function UpdateClass()
    {
        $data = array(
            "class_name" => $this->input->post('class_name'),
            "class_description" => $this->input->post('class_description'),
            "semester" => $this->input->post('semester'),
        );
        return $this->db->update('mahasiswa_class', $data, array('id' => $this->input->post('id')));
    }
    public function DeleteClass($id)
    {
        return $this->db->delete('mahasiswa_class', array("id" => $id));
    }
}
