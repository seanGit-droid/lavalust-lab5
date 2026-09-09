<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <style>
        body { font-family: sans-serif; background: #121824; color: #fff; padding: 40px; }
        .form-card { max-width: 500px; margin: 0 auto; background: #1d2636; padding: 25px; border-radius: 8px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input, textarea { width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #334155; background: #0f172a; color: #fff; box-sizing: border-box; }
        button { background: #4f46e5; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; width: 100%; }
    </style>
</head>
<body>

<div class="form-card">
    <h2>Add New Product</h2>
    <form action="<?=site_url('products/store');?>" method="POST">
        <div class="form-group">
            <label>Product Name</label>
            <input type="text" name="name" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" step="0.01" name="price" required>
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="number" name="quantity" required>
        </div>
        <button type="submit">Save Product</button>
    </form>
</div>

</body>
</html>