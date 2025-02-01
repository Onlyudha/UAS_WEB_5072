<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model'); 
        $this->load->library('form_validation'); 
    }

    public function login() {
        $this->load->view('templates/head');
        $this->load->view('auth/login');
        $this->load->view('templates/footer');
    }

    public function login_process() {

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if (empty($username) || empty($password)) {
            $this->session->set_flashdata('error', 'Username dan Password harus diisi!');
            redirect('auth/login');
        }

        $user = $this->User_model->login($username, $password);

        if ($user) {

            $session_data = array(
                'id'        => $user->id,
                'username'  => $user->username,
                'role'      => $user->role,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($session_data);


            switch ($user->role) {
                case 'admin':
                    redirect('admin');
                    break;
                case 'dosen':
                    redirect('dosen');
                    break;
                case 'mahasiswa':
                    redirect('mahasiswa');
                    break;
                default:
                    $this->session->set_flashdata('error', 'Role tidak valid!');
                    redirect('auth/login');
            }
        } else {

            $this->session->set_flashdata('error', 'Username atau Password salah!');
            redirect('auth/login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
