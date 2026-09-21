<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersModel extends Model {

    public function all() {
        return $this->db->table('users')->get_all();
    }
}