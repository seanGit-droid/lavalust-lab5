<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Products extends Controller {

    public function __construct() {
        parent::__construct();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->call->library('session');

        $isLoggedIn = (!empty($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) || !empty($_SESSION['user_id']);
        if (!$isLoggedIn) {
            $_SESSION['error'] = 'Please log in to access this page.';
            $_SESSION['auth_error'] = 'Please log in to access this page.';
            redirect('login');
            exit;
        }

        $this->call->model('Product_model');
    }

    public function index() {
        $products = [];
        try {
            $products = $this->Product_model->get_all_products();
        } catch (\Throwable $e) {
            $products = [];
        }

        $success = $_SESSION['success'] ?? $this->session->flashdata('success') ?? null;
        $error   = $_SESSION['error']   ?? $this->session->flashdata('error')   ?? null;
        unset($_SESSION['success'], $_SESSION['error']);

        $this->call->view('products/index', [
            'page_title' => 'Products Management',
            'products'   => $products ?: [],
            'items'      => $products ?: [],
            'success'    => $success,
            'error'      => $error,
            'username'   => $_SESSION['username'] ?? 'Admin'
        ]);
    }

    // Alias for index
    public function inventory() {
        $this->index();
    }

    public function create() {
        $error = $_SESSION['error'] ?? $this->session->flashdata('error') ?? null;
        $old   = $_SESSION['old']   ?? [];
        unset($_SESSION['error'], $_SESSION['old']);

        $this->call->view('products/create', [
            'page_title' => 'Add Product',
            'error'      => $error,
            'old'        => $old
        ]);
    }

    // Alias for create
    public function add_item() {
        $this->create();
    }

    public function store() {
        $product_name = trim($this->io->post('product_name') ?? $this->io->post('name') ?? $_POST['product_name'] ?? $_POST['name'] ?? '');
        $description  = trim($this->io->post('description')  ?? $_POST['description']  ?? '');
        $price        = trim($this->io->post('price')        ?? $_POST['price']        ?? '');
        $quantity     = trim($this->io->post('quantity')     ?? $_POST['quantity']     ?? '');

        if ($product_name === '' || $price === '' || $quantity === '') {
            $msg = 'Product name, price, and quantity are required.';
            $_SESSION['error'] = $msg;
            $_SESSION['old'] = $_POST;
            redirect('products/create');
            exit;
        }

        if (!is_numeric($price) || (float)$price < 0) {
            $msg = 'Price must be a valid non-negative number.';
            $_SESSION['error'] = $msg;
            $_SESSION['old'] = $_POST;
            redirect('products/create');
            exit;
        }

        if (!is_numeric($quantity) || (int)$quantity < 0 || (string)(int)$quantity !== (string)$quantity) {
            $msg = 'Quantity must be a valid non-negative integer.';
            $_SESSION['error'] = $msg;
            $_SESSION['old'] = $_POST;
            redirect('products/create');
            exit;
        }

        try {
            $this->Product_model->insert_product([
                'product_name' => $product_name,
                'description'  => $description,
                'price'        => number_format((float)$price, 2, '.', ''),
                'quantity'     => (int)$quantity
            ]);
            $_SESSION['success'] = 'Product added successfully.';
        } catch (\Throwable $e) {
            $_SESSION['error'] = 'Database error: ' . $e->getMessage();
        }

        redirect('products');
        exit;
    }

    // Alias for store
    public function save_item() {
        $this->store();
    }

    public function edit($id = null) {
        $id = $id ?? $this->io->get('id') ?? $_GET['id'] ?? null;
        if (!$id) {
            redirect('products');
            exit;
        }

        $product = null;
        try {
            $product = $this->Product_model->get_product_by_id($id);
        } catch (\Throwable $e) {
            $product = null;
        }

        if (!$product) {
            $_SESSION['error'] = 'Product not found.';
            redirect('products');
            exit;
        }

        $error = $_SESSION['error'] ?? null;
        unset($_SESSION['error']);

        $this->call->view('products/edit', [
            'page_title' => 'Edit Product',
            'product'    => $product,
            'item'       => $product,
            'error'      => $error
        ]);
    }

    // Alias for edit
    public function modify_item($id = null) {
        $this->edit($id);
    }

    public function update($id = null) {
        $id = $id ?? $this->io->get('id') ?? $_GET['id'] ?? $this->io->post('id') ?? $_POST['id'] ?? null;
        if (!$id) {
            redirect('products');
            exit;
        }

        $product_name = trim($this->io->post('product_name') ?? $this->io->post('name') ?? $_POST['product_name'] ?? $_POST['name'] ?? '');
        $description  = trim($this->io->post('description')  ?? $_POST['description']  ?? '');
        $price        = trim($this->io->post('price')        ?? $_POST['price']        ?? '');
        $quantity     = trim($this->io->post('quantity')     ?? $_POST['quantity']     ?? '');

        if ($product_name === '' || $price === '' || $quantity === '') {
            $_SESSION['error'] = 'Product name, price, and quantity are required.';
            redirect('products/edit/' . $id);
            exit;
        }

        if (!is_numeric($price) || (float)$price < 0) {
            $_SESSION['error'] = 'Price must be a valid non-negative number.';
            redirect('products/edit/' . $id);
            exit;
        }

        if (!is_numeric($quantity) || (int)$quantity < 0 || (string)(int)$quantity !== (string)$quantity) {
            $_SESSION['error'] = 'Quantity must be a valid non-negative integer.';
            redirect('products/edit/' . $id);
            exit;
        }

        try {
            $this->Product_model->update_product($id, [
                'product_name' => $product_name,
                'description'  => $description,
                'price'        => number_format((float)$price, 2, '.', ''),
                'quantity'     => (int)$quantity
            ]);
            $_SESSION['success'] = 'Product updated successfully.';
        } catch (\Throwable $e) {
            $_SESSION['error'] = 'Database error: ' . $e->getMessage();
        }

        redirect('products');
        exit;
    }

    // Alias for update
    public function update_item($id = null) {
        $this->update($id);
    }

    public function delete($id = null) {
        $id = $id ?? $this->io->get('id') ?? $_GET['id'] ?? null;
        if ($id) {
            try {
                $this->Product_model->delete_product($id);
                $_SESSION['success'] = 'Product deleted successfully.';
            } catch (\Throwable $e) {
                $_SESSION['error'] = 'Database error: ' . $e->getMessage();
            }
        }

        redirect('products');
        exit;
    }

    // Alias for delete
    public function remove_item($id = null) {
        $this->delete($id);
    }
}
