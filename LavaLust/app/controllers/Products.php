public function store() {
    $data = array(
        'name'        => $this->io->post('name') ?? $this->io->post('product_name') ?? '',
        'description' => $this->io->post('description') ?? '',
        'price'       => $this->io->post('price') ?? 0,
        'quantity'    => $this->io->post('quantity') ?? $this->io->post('qty') ?? 0
    );
    
    $this->Product_model->insert_product($data);
    redirect('products');
}

public function update($id) {
    $data = array(
        'name'        => $this->io->post('name') ?? $this->io->post('product_name') ?? '',
        'description' => $this->io->post('description') ?? '',
        'price'       => $this->io->post('price') ?? 0,
        'quantity'    => $this->io->post('quantity') ?? $this->io->post('qty') ?? 0
    );
    
    $this->Product_model->update_product($id, $data);
    redirect('products');
}