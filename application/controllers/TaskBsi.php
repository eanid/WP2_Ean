<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TaskBsi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Task_bsi_model');
        $this->load->library('form_validation');
    }
    //  mahasiswa
    public function index()
    {


        $data['students'] = $this->Task_bsi_model->GetMahasiswa();
        $data['class'] = $this->Task_bsi_model->GetClass();
        $this->slice->view('mahasiswa', $data);
    }

    public function edit($nim){
        $data['student'] = $this->Task_bsi_model->GetMahasiswaByNim($nim);
        $data['students'] = $this->Task_bsi_model->GetMahasiswa();
        $data['class'] = $this->Task_bsi_model->GetClass();

        $data['class_dropdown'] = $this->Task_bsi_model->selectClass();

        $this->slice->view('mahasiswa_edit', $data);
        // var_dump($data["student"]);
    }

    public function update($nim){
  // form validation rules
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('nim', 'nim', 'required|numeric');
        $this->form_validation->set_rules('class', 'class', 'required|numeric');

        // if the form validation passes
        if ($this->form_validation->run() == TRUE)
        {
            // insert the data into the database
            $this->Task_bsi_model->UpdateMahasiswa($nim);

            // redirect to the product details page

            $this->session->set_flashdata('pesanku', $nim.'Berhasil Update!!');
            redirect('/','refresh');
            
        } else {
            $data['students'] = $this->Task_bsi_model->GetMahasiswa();
            $data['class'] = $this->Task_bsi_model->GetClass();
            $this->slice->view('mahasiswa', $data);
        }
    }

    public function store()
    {

        // form validation rules
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('nim', 'nim', 'required|numeric');
        $this->form_validation->set_rules('class', 'class', 'required|numeric');

        // if the form validation passes
        if ($this->form_validation->run() == TRUE)
        {
            // insert the data into the database
            $id = $this->Task_bsi_model->SaveMahasiswa();

            // redirect to the product details page

            $this->session->set_flashdata('pesanku', 'Berhasil!!');
            redirect('/','refresh');
            
        } else {
            $data['students'] = $this->Task_bsi_model->GetMahasiswa();
            $data['class'] = $this->Task_bsi_model->GetClass();
            $this->slice->view('mahasiswa', $data);
        }
    }
    public function add_class()
    {

        // form validation rules
        $this->form_validation->set_rules('class_name', 'class_name', 'required');
        $this->form_validation->set_rules('class_descripttion', 'class_descripttion', 'required');
        $this->form_validation->set_rules('semester', 'semester', 'required|numeric');

        // if the form validation passes
        if ($this->form_validation->run() == TRUE)
        {
            // insert the data into the database
            $id = $this->Task_bsi_model->SaveClass();

            // redirect to the product details page
            redirect('/');
        }
    }

    public function view($slug = NULL)
    {
        $data['data'] = $this->Task_bsi_model->GetMahasiswaByNim($slug);
        $this->load->view('mahasiswa_detail', $data);
    }
}
