<?php defined('BASEPATH') OR exit('No direct script access allowed');
class DataMhs extends CI_Controller{    
    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('Mahasiswa_model');
    }

    public function index()
    {
        $data= $this->Mahasiswa_model->getMahasiswa();
        $this->load->view('mahasiswa', array('data' => $data));
    }
    
    public function view($slug = NULL)
    {
    
        $data['data'] = $this->Mahasiswa_model->getMahasiswaByNim($slug);
        $this->load->view('mahasiswa_detail', $data);
        // echo var_dump($data->nama);

    }
}