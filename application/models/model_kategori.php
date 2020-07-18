<?php 
    class Model_kategori extends CI_Model{

        public function main_course(){
            return $this->db->get_where('tbl_menu', array('kategori'=>'Main Course'));
        }

        public function drinks(){
            return $this->db->get_where('tbl_menu', array('kategori'=>'Drinks'));
        }

        public function snacks(){
            return $this->db->get_where('tbl_menu', array('kategori'=>'Snacks'));
        }

        public function desserts(){
            return $this->db->get_where('tbl_menu', array('kategori'=>'Desserts'));
        }

    }
?>