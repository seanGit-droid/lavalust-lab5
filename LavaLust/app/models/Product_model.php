<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Product_model extends Model {

    protected $table = 'products';
    protected $primary_key = 'id';
    protected $fillable = [
        'product_name',
        'description',
        'price',
        'quantity'
    ];

    public function get_all_products() {
        return $this->db->table($this->table)->get_all();
    }

    public function all() {
        return $this->get_all_products();
    }

    public function get_product_by_id($id) {
        $result = $this->db->table($this->table)->where($this->primary_key, $id)->get();
        if (is_array($result) && isset($result[0]) && is_array($result[0])) {
            return $result[0];
        }
        return $result;
    }

    public function find($id) {
        return $this->get_product_by_id($id);
    }

    public function insert_product($data) {
        return $this->db->table($this->table)->insert($data);
    }

    public function insert($data) {
        return $this->insert_product($data);
    }

    public function update_product($id, $data) {
        return $this->db->table($this->table)->where($this->primary_key, $id)->update($data);
    }

    public function update($id, $data) {
        return $this->update_product($id, $data);
    }

    public function delete_product($id) {
        return $this->db->table($this->table)->where($this->primary_key, $id)->delete();
    }

    public function delete($id) {
        return $this->delete_product($id);
    }
}
