<?php

    class Dashboard extends CI_ControLLer{

        public function __construct(){
            parent::__construct();
            if ($this->session->userdata('role_id') != '2') {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> Anda Harus Login Terlebih Dahulu.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
              redirect('auth/login');
            }
        }

        public function search(){
            $keyword = $this->input->post('keyword');
            $data['menu'] = $this->model_menu->getKeyword($keyword);
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('dashboard', $data);
            $this->load->view('templates/footer');

        }

        public function detail($id_barang){
            $data['menu'] = $this->model_menu->detailMenu($id_barang);
            $this->load->view("templates/header");
            $this->load->view("templates/sidebar");
            $this->load->view("detail_menu", $data);
            $this->load->view("templates/footer");

        }

        public function tambahKeKeranjang($id){
            $menu = $this->model_menu->find($id);

            $data = array('id' => $menu->id_menu, 'qty'=>1, 'price'=>$menu->harga, 'name'=>$menu->nama_menu);
            $this->cart->insert($data);
            redirect('dashboard/detailKeranjang');
        }

        public function detailKeranjang(){
            $this->load->view("templates/header");
            $this->load->view("templates/sidebar");
            $this->load->view("keranjang");
            $this->load->view("templates/footer");
        }

        public function hapusKeranjang(){
            
            $this->cart->destroy();
            redirect('welcome');
            
            
        }

        public function pembayaran(){
            $this->load->view("templates/header");
            $this->load->view("templates/sidebar");
            $this->load->view("pembayaran");
            $this->load->view("templates/footer");
        }

        public function prosesPesanan(){
            $is_processed = $this->model_invoice->index();

            if ($is_processed) {
            $this->cart->destroy();
            $this->load->view("templates/header");
            $this->load->view("templates/sidebar");
            $this->load->view("proses");
            $this->load->view("templates/footer");
            }else {
                echo "Maaf! Pesanan Anda Gagal diProses";
            }



        }

        public function hapus_item($id){
            
            $this->cart->remove($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('dashboard/detailKeranjang');
        }

        public function update_cart($rowid){
            if ($rowid) {
                $data = array('rowid'=>$rowid, 'qty'=>$this->input->post('qty'));
                $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Data!</strong> Keranjang Berhasil DiUpdate!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
              $this->cart->update($data);
              redirect('dashboard/detailKeranjang');
            }else {
                redirect('dashboard/detailKeranjang');
            }
            

        }

        public function updateItemQty(){
            $update = 0;

            $rowid = $this->input->get('rowid');
            $qty = $this->input->get('qty');

            if (!empty($rowid) && !empty($qty)) {
                $data = array('rowid'=>$rowid, 'qty'=> $qty);
                $update = $this->cart->update($data);
            }
            echo $update?'ok':'err';
        }

        public function addtocart(){
            $row_id= $_POST['row'];
            $qty = ($_POST['qty'] + 1);
            $array=array('rowid' =>$row_id ,'qty'=>$qty );
            $this->cart->update($array);
            $data = array(
            'status' => 'Success',
            );
            echo json_encode($data);
            }
        public function reducecart(){
            $row_id= $_POST['row'];
            $qty = ($_POST['qty'] - 1);
            $array=array('rowid' =>$row_id ,'qty'=>$qty );
            $this->cart->update($array);
            $data = array(
            'status' => 'Success',
            );
            echo json_encode($data);
            }
        
    }

?>