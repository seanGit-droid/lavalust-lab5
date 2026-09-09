<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Products extends Controller {

    public function __construct() {
        parent::__construct();
        $this->call->model('Product_model');
    }

    public function index() {
        $data['products'] = $this->Product_model->get_all_products();
        $this->call->view('products/index', $data);
    }

    public function create() {
        $this->call->view('products/create');
    }

    public function store() {
        // Safe input fetching using isset/empty checks
        $name        = isset($_POST['name']) ? $_POST['name'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $price       = isset($_POST['price']) ? $_POST['price'] : 0;
        $quantity    = isset($_POST['quantity']) ? $_POST['quantity'] : 0;

        $data = array(
            'name'        => $name,
            'description' => $description,
            'price'       => $price,
            'quantity'    => $quantity
        );

        $this->Product_model->insert_product($data);
        redirect('products');
    }

    public function edit($id) {
        $data['product'] = $this->Product_model->get_product_by_id($id);
        $this->call->view('products/edit', $data);
    }

    public function update($id) {
        $name        = isset($_POST['name']) ? $_POST['name'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $price       = isset($_POST['price']) ? $_POST['price'] : 0;
        $quantity    = isset($_POST['quantity']) ? $_POST['quantity'] : 0;

        $data = array(
            'production_name'        => $name,
            'description' => $description,
            'price'       => $price,
            'qty'    => $quantity
        );

        $this->Product_model->update_product($id, $data);
        redirect('products');
    }

    public function delete($id) {
        $this->Product_model->delete_product($id);
        redirect('products');
    }
}