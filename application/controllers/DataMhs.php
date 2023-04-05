<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DataMhs extends CI_Controller{
    public function __construct()
    {
        parent::__construct(); 
        $this->load->database();
    }
    
    public function index()
    {
        $data= $this->db->query('select * from mahasiswa');
        foreach($data->result_array() as $d){
        echo "Nim mahasiswa : ".$d['nim']."<br />";
        echo "Nama mahasiswa : ".$d['nama']."<br />";
        echo "Kelas mahasiswa : ".$d['kelas']."<br />";
        }
    }

    // public function index(){
    //     // $data=$this->db->query('select * from mahasiswa');foreach($data->result_array() as $d){
    //     //     echo "Nim mahasiswa : ".$d['nim']."<br />";
    //     //     echo "Nama mahasiswa : ".$d['nama']."<br />";
    //     //     echo "Kelas mahasiswa : ".$d['kelas']."<br />";
    //     // }
    //     echo"wow";
    // }
}