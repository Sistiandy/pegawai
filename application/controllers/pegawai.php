<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pegawai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('pegawai_model');
    }

    function index() { //untuk menampilkan form awal yaitu form tambah data cd 
        ini_set('error_reporting', E_STRICT);
        $data['pegawai'] = "";
        $data['view_pegawai'] = $this->pegawai_model->read_data();
        $this->load->model('pegawai_model');
        $data['page'] = 'pegawai/kelola';
        $this->load->view('layout', $data);
    }

    function update($id) {
        $data['pegawai'] = $this->pegawai_model->get_data($id);
        $data['page'] = 'pegawai/edit';
        $this->load->view('layout', $data);
    }

    function update_process() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['page'] = 'pegawai/edit';
            $this->load->view('layout', $data);
        } else { 
            $pegawai = array(
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email'),
                'no_telp' => $this->input->post('no_telp')
            );
            $this->pegawai_model->update($this->input->post('id'), $pegawai);
            redirect('pegawai');
        }
    }

    function delete() { //untuk menghapus data cd
        $kode = $this->security->xss_clean($this->uri->segment(3));
        $result = $this->pegawai_model->get_data($kode);
        if ($result == null) {
            redirect('pegawai');
        } else {
            $delete = $this->pegawai_model->delete_data($kode);
            if ($delete)
                $this->session->set_flashdata('message', 'Data deleted!');
            else
                $this->session->set_flashdata('message', 'Failed to delete data!');
            redirect('pegawai');
        }
    }

    public function create() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['page'] = 'pegawai/add';
            $this->load->view('layout', $data);
        } else {
            $data = array(
                'id' => $this->input->post('id'),
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email'),
                'no_telp' => $this->input->post('no_telp')
            );
            $this->pegawai_model->create_data($data);
        }
    }

}
