<?php

    class Dashboard extends CI_ControLLer{

        public function __construct(){
            parent::__construct();
            if ($this->session->userdata('role_id') != '1') {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> Anda Harus Login Terlebih Dahulu.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
              redirect('auth/login');
            }
        }
        
        public function index(){
            $data['count'] = $this->model_adm->getCountInvoice();
            $data['menu'] = $this->model_adm->getCountMenu();
            $data['user'] = $this->model_adm->getCountUser();
            $this->load->view("admin/templates/header");
            $this->load->view("admin/templates/sidebar");
            $this->load->view("admin/dashboard", $data);
            $this->load->view("admin/templates/footer");
        }

        public function search(){
            $keyword = $this->input->post('keyword');
            $data['menu'] = $this->model_menu->getKeyword($keyword);
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/data_menu', $data);
            $this->load->view('templates/footer');

        }
        
            
       
    }
?>