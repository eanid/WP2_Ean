<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TaskBsi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Task_bsi_model');
    }
    //  mahasiswa
    public function index()
    {

        if ($this->input->post('submit')) {
            // form validation rules
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('nim', 'nim', 'required|numeric');
            $this->form_validation->set_rules('class', 'class', 'required|numeric');

            // if the form validation passes
            if ($this->form_validation->run() !== false) {
                $data = array(
                    'name' => $this->input->post('name'),
                    'nim' => $this->input->post('nim'),
                    'class' => $this->input->post('class')
                );

                // insert the data into the database
                $id = $this->product_model->SaveMahasiswa($data);

                // redirect to the product details page
                redirect('/' . $id);
            }
        }

        $data = $this->Task_bsi_model->GetMahasiswa();
        $this->slice->view('mahasiswa', array('data' => $data));
    }
    public function view($slug = NULL)
    {
        $data['data'] = $this->Task_bsi_model->GetMahasiswaByNim($slug);
        $this->load->view('mahasiswa_detail', $data);
    }
}
