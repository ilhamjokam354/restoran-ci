<?php 
    class Kategori extends CI_ControLLer{
        public function main_course(){
            $data['main_course']= $this->model_kategori->main_course()->result();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('main_course', $data);
            $this->load->view('templates/footer');
        }

        public function drinks(){
            $data['drinks']= $this->model_kategori->drinks()->result();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('drinks', $data);
            $this->load->view('templates/footer');
        }

        public function snacks(){
            $data['snacks']= $this->model_kategori->snacks()->result();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('snacks', $data);
            $this->load->view('templates/footer');
        }

        public function desserts(){
            $data['desserts']= $this->model_kategori->desserts()->result();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('desserts', $data);
            $this->load->view('templates/footer');
        }

       
    }
?>