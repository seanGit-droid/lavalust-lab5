<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Product_model extends Model {

<<<<<<< HEAD
    // Fetch all products for Czyen's dashboard
=======
>>>>>>> 08eae6d04971826e8153e702e6c1c05b634b5a87
    public function get_all_products() {
        return $this->db->table('products')->get_all();
    }

<<<<<<< HEAD
    // Fetch single product details by ID
=======
>>>>>>> 08eae6d04971826e8153e702e6c1c05b634b5a87
    public function get_product_by_id($id) {
        return $this->db->table('products')->where('id', $id)->get();
    }

<<<<<<< HEAD
    // Insert new product into Aiven MySQL database
=======
>>>>>>> 08eae6d04971826e8153e702e6c1c05b634b5a87
    public function insert_product($data) {
        return $this->db->table('products')->insert($data);
    }

<<<<<<< HEAD
    // Update product info in database
=======
>>>>>>> 08eae6d04971826e8153e702e6c1c05b634b5a87
    public function update_product($id, $data) {
        return $this->db->table('products')->where('id', $id)->update($data);
    }

<<<<<<< HEAD
    // Remove product entry
=======
>>>>>>> 08eae6d04971826e8153e702e6c1c05b634b5a87
    public function delete_product($id) {
        return $this->db->table('products')->where('id', $id)->delete();
    }
}