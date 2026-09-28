<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersModel extends Model
{
    protected $table = 'users';

    public function all()
    {
        try {
            return $this->db->table($this->table)->get_all();
        } catch (\Throwable $e) {
            return [];
        }
    }
}
