<?php
    class Model_menu extends CI_Model{

        public function tampilData(){
            return $this->db->get('tbl_menu');
        }

        public function tambahMenu($data, $table){
            $this->db->insert($table,$data);
        }

        public function detailMenu($id_menu){
            $result = $this->db->where('id_menu', $id_menu)->get('tbl_menu');
            if ($result->num_rows() > 0) {
                return $result->result();
            }else {
                return false;
            }
        }

        public function editMenu($where, $table){
            return $this->db->get_where($table, $where);
        }

        public function updateData($where, $data, $table){
            $this->db->where($where);
            $this->db->update($table, $data);
        }

        public function hapusData($where, $table){
            $this->db->where($where);
            $this->db->delete($table);
        }

        public function find($id){
            $result = $this->db->where('id_menu', $id)->limit(1)->get('tbl_menu');
            
            if ($result->num_rows()> 0) {
                return $result->row();
            }else {
                return array();
            }
        }

        public function getKeyword($keyword){
            $this->db->select('*');
            $this->db->from('tbl_menu');
            $this->db->like('nama_menu', $keyword);
            $this->db->or_like('keterangan', $keyword);
            $this->db->or_like('kategori', $keyword);
            $this->db->or_like('harga', $keyword);
            $this->db->or_like('stok', $keyword);
            
            return $this->db->get()->result();
        }
    }
?>