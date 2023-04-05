<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DataMhs extends CI_Controller{    
    public function index()
    {
        $data= $this->db->query('select * from mahasiswa');
        foreach($data->result_array() as $d){
        echo "<a href='http://creads.ean/datamhs/view/".$d['nim']."'>Nim mahasiswa : ".$d['nim']."<br />";
        echo "Nama mahasiswa : ".$d['nama']."<br />";
        echo "Kelas mahasiswa : ".$d['kelas']."<br /></a><br />";
        }
    }

    public function view($slug = NULL)
    {
        $data = $this->db->get_where('mahasiswa', array('nim' => $slug));
        foreach($data->result_array() as $d){
            echo "<a href='http://creads.ean/datamhs'><button>back</button></a><br />";
            echo "Nim mahasiswa : ".$d['nim']."<br />";
            echo "Nama mahasiswa : ".$d['nama']."<br />";
            echo "Kelas mahasiswa : ".$d['kelas']."<br />";
            }
    }
}