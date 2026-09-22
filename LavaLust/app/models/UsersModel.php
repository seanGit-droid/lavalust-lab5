<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

<<<<<<< HEAD
class UsersModel extends Model
{
    protected $table = 'users';
}
?>
=======
class UsersModel extends Model {

    public function all() {
        return $this->db->table('users')->get_all();
    }
}
>>>>>>> 08eae6d04971826e8153e702e6c1c05b634b5a87
