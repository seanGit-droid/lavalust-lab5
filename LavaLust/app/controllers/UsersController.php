<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

<<<<<<< HEAD
class UsersController extends Controller
{
    public function index()
    {
        $this->call->model('UsersModel');
        $data['users'] = $this->UsersModel->all();
        $data['page_title'] = 'Users List';
        $this->call->view('users/index', $data);
    }
}
?>
=======
class UsersController extends Controller {

    public function index() {
        // I-load ang UsersModel
        $this->call->model('UsersModel');

        // Tawagin ang get_users() method mula sa UsersModel
        $data['users'] = $this->UsersModel->all();

        // Ipapasa ang data sa 'users/index' view
        $this->call->view('users/index', $data);
    }
}
>>>>>>> 08eae6d04971826e8153e702e6c1c05b634b5a87
