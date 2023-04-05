<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DataMhs extends CI_Controller{    
    public function index()
    {
        $data= $this->Mahasiswa_model->getMahasiswa();
        $this->load->view('mahasiswa', array('data' => $data));
    }

    public function view($slug = NULL)
    {
        $data= $this->Mahasiswa_model->getMahasiswaByNim($slug);
        foreach($data as $d){
            echo "<a href='http://creads.ean/datamhs'><button>back</button></a><br />";
            echo "Nim mahasiswa : ".$d['nim']."<br />";
            echo "Nama mahasiswa : ".$d['nama']."<br />";
            echo "Kelas mahasiswa : ".$d['kelas']."<br />";
            }
    }
}