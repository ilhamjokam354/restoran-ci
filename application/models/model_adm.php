<?php
    class Model_adm extends CI_Model{
        public function getCountInvoice(){
            $sql = "SELECT COUNT(nama) AS nama FROM tbl_invoice";
            $result = $this->db->query($sql);
            return $result->row()->nama;
        }

        public function getCountMenu(){
            $sql = "SELECT COUNT(nama_menu) AS nama_menu FROM tbl_menu";
            $result = $this->db->query($sql);
            return $result->row()->nama_menu;
        }

        public function getCountUser(){
            $sql = "SELECT COUNT(username) AS username FROM tbl_user";
            $result = $this->db->query($sql);
            return $result->row()->username;
        }
    }
?>