<?php 
    class Invoice extends CI_ControLLer{

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
            $data['invoice'] = $this->model_invoice->tampilData();
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/invoice', $data);
            $this->load->view('admin/templates/footer');
        }

        public function detail($id_invoice){
            $data['invoice'] = $this->model_invoice->ambilDataIdInvoice($id_invoice);
            $data['pesanan'] = $this->model_invoice->ambilDataIdPesanan($id_invoice);
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/detail_pesanan', $data);
            $this->load->view('admin/templates/footer');
        }

        public function search(){
            $keyword = $this->input->post('keyword');
            $data['invoice'] = $this->model_invoice->getKeyword($keyword);
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/invoice', $data);
            $this->load->view('templates/footer');

        }
    }

?>