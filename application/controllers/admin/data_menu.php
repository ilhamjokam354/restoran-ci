<?php

    class Data_menu extends CI_ControLLer{

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
            $data['menu']= $this->model_menu->tampilData()->result();
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/data_menu', $data);
            $this->load->view('admin/templates/footer');
        }

        public function tambahData(){
            $nama = $this->input->post('nama');
            $keterangan = $this->input->post('ket');
            $kategori = $this->input->post('kategori');
            $harga = $this->input->post('harga');
            $stok = $this->input->post('stok');
            $gambar = $_FILES['gambar']['name'];

            if ($gambar = '') {
                
            }else{
                $config ['upload_path'] = './uploads';
                $config ['allowed_types'] = 'jpg|jpeg|png|gif';

                $this->load->library('upload' , $config);
                if (!$this->upload->do_upload('gambar')) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Upload Gambar Gagal, Silahkan Cek Kembali
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                }else {
                    $gambar = $this->upload->data('file_name');
                }
            }

            $data = array('nama_menu' => $nama, 'keterangan' => $keterangan, 'kategori' => $kategori, 'harga' => $harga, 'stok' => $stok, 'gambar' => $gambar);
            $this->model_menu->tambahMenu($data, 'tbl_menu');
            redirect('admin/data_menu');
        }

        public function detail($id_barang){
            $data['menu'] = $this->model_menu->detailMenu($id_barang);
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/detail_menu', $data);
            $this->load->view('admin/templates/footer');

        }

        public function edit($id){
            $where = array('id_menu' => $id);
            $data['menu'] = $this->model_menu->editMenu($where, 'tbl_menu')->result();
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/edit_menu', $data);
            $this->load->view('admin/templates/footer');
        }

        public function update(){
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $keterangan = $this->input->post('ket');
            $kategori = $this->input->post('kategori');
            $harga = $this->input->post('harga');
            $stok = $this->input->post('stok');
            $gambar = $_FILES['gambar']['name'];

            if ($gambar = '') {
                
            }else{
                $config ['upload_path'] = './uploads';
                $config ['allowed_types'] = 'jpg|jpeg|png|gif';

                $this->load->library('upload' , $config);
                if (!$this->upload->do_upload('gambar')) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Upload Gambar Gagal, Silahkan Cek Kembali
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                }else {
                    $gambar = $this->upload->data('file_name');
                }
            }
            $data = array('nama_menu' => $nama, 'keterangan' => $keterangan, 'kategori' => $kategori, 'harga' => $harga, 'stok' => $stok, 'gambar'=> $gambar);
            $where = array('id_menu' => $id);

            $this->model_menu->updateData($where, $data, 'tbl_menu');
            redirect('admin/data_menu/index');
        }

        public function hapus($id){
            $where = array('id_menu' => $id);
            $this->model_menu->hapusData($where, 'tbl_menu');
            redirect('admin/data_menu/index');

        }
    }
?>