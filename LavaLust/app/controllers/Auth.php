<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Auth extends Controller {

    public function __construct() {
        parent::__construct();
        $this->call->library('session');
    }
    
    public function login() {
<<<<<<< HEAD
        // Redirect to products dashboard if already logged in
        if ($this->session->userdata('logged_in')) {
            redirect('products');
        }
        $this->call->view('auth/login');
    }

    // Process Login Request
=======
        $this->call->view('auth/login');
    }

>>>>>>> 08eae6d04971826e8153e702e6c1c05b634b5a87
    public function authenticate() {
        $username = $this->io->post('username');
        $password = $this->io->post('password');

<<<<<<< HEAD
        // Czyen's Admin Credentials
        if ($username === 'czyen' && $password === 'czyen123') {
            $this->session->set_userdata('logged_in', true);
            $this->session->set_userdata('username', $username);
            redirect('products');
        } else {
    $this->session->set_flashdata('error', 'Invalid username or password! Please try again.');
    redirect('login');
}
    }

    // Logout Session
    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
=======
        if ($username === 'admin' && $password === 'admin123') {
            $this->session->set_userdata('logged_in', true);
            $this->session->set_userdata('username', $username);
            
            // Lagyan ng '/' bago ang route name para malinis ang URL redirect
            redirect('/products'); 
        } else {
            $this->session->set_flashdata('error', 'Invalid username or password');
            
            // Lagyan din ng '/' dito
            redirect('/login'); 
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('/login');
>>>>>>> 08eae6d04971826e8153e702e6c1c05b634b5a87
    }
}