<?php  
    class Auth extends CI_ControLLer{
        public function login(){
            $this->form_validation->set_rules('username', 'Username', 'required', ['required'=> 'Username Wajib diIsi!']);
            $this->form_validation->set_rules('password', 'Password', 'required', ['required'=> 'Password Tidak Boleh Kosong!']);
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header');
                $this->load->view('login');
                $this->load->view('templates/footer');
            }else {
                $auth = $this->model_auth->cekLogin();

                if ($auth == FALSE) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Username atau Password Salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                  redirect('auth/login');
                }else {
                    $this->session->set_userdata('username', $auth->username);
                    $this->session->set_userdata('role_id', $auth->role_id);

                    switch ($auth->role_id) {
                        case 1:
                            redirect('admin/dashboard');
                            break;

                        case 2:
                            redirect('welcome');
                            break;
                        default:
                            # code...
                            break;
                    }
                }
            }
        }

        public function logout(){
            $this->session->sess_destroy();
            redirect('auth/login');
        }
    }

?>