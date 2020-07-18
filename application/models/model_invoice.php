<?php 
    class Model_invoice extends CI_Model{
        public function index(){
            date_default_timezone_set('Asia/Jakarta');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');

            $invoice = array('nama'=>$nama, 'alamat'=>$alamat, 'tgl_pesan'=>date('Y-m-d H:i:s'), 'batas_bayar'=> date('Y-m-d H:i:s', mktime( date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))));
            $this->db->insert('tbl_invoice', $invoice);
            $id_invoice = $this->db->insert_id();

            foreach ($this->cart->contents() as $key) {
                $data = array('id_invoice'=>$id_invoice, 'id_menu'=>$key['id'], 'nama_menu'=>$key['name'], 'jumlah'=>$key['qty'], 'harga'=>$key['price']);
                $this->db->insert('tbl_pesanan', $data);
            }
            return true;
        }


        public function tampilData(){
            $result =$this->db->get('tbl_invoice');
            if ($result->num_rows()> 0 ) {
                return $result->result();
            }else {
                return false;
            }
        }

        public function ambilDataIdInvoice($id_invoice){
            $result = $this->db->where('id', $id_invoice)->limit(1)->get('tbl_invoice');
            if ($result->num_rows() > 0) {
                return $result->row();
            }else {
                return false;
            }
        }

        public function ambilDataIdPesanan($id_invoice){
            $result = $this->db->where('id_invoice', $id_invoice)->get('tbl_pesanan');
            if ($result->num_rows() > 0) {
                return $result->result();
            }else {
                return false;
            }
        }


        public function getKeyword($keyword){
            $this->db->select('*');
            $this->db->from('tbl_invoice');
            $this->db->like('nama', $keyword);
            $this->db->or_like('alamat', $keyword);
            $this->db->or_like('tgl_pesan', $keyword);
            $this->db->or_like('batas_bayar', $keyword);
    
            return $this->db->get()->result();
        }
    }

?>