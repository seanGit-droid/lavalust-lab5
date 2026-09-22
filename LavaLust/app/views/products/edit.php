<?php /** @var array $product */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - Inventory Suite</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-xl shadow-sm border border-slate-200 w-full max-w-lg">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-slate-900">Edit Product</h2>
            <p class="text-xs text-slate-500 mt-1">Update details for item #<?= $product['id']; ?></p>
        </div>
        
        <form action="<?= site_url('products/update_item?id=' . $product['id']); ?>" method="POST" class="space-y-4">
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1.5">Product Name</label>
                <input type="text" name="product_name" value="<?= htmlspecialchars($product['product_name']); ?>" required class="w-full bg-slate-50 border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 rounded-lg px-3.5 py-2.5 text-slate-900 text-sm transition outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1.5">Description</label>
                <textarea name="description" rows="3" class="w-full bg-slate-50 border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 rounded-lg px-3.5 py-2.5 text-slate-900 text-sm transition outline-none"><?= htmlspecialchars($product['description']); ?></textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1.5">Price (₱)</label>
                    <input type="number" step="0.01" name="price" value="<?= $product['price']; ?>" required class="w-full bg-slate-50 border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 rounded-lg px-3.5 py-2.5 text-slate-900 text-sm transition outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1.5">Quantity</label>
                    <input type="number" name="quantity" value="<?= $product['quantity']; ?>" required class="w-full bg-slate-50 border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 rounded-lg px-3.5 py-2.5 text-slate-900 text-sm transition outline-none">
                </div>
            </div>
            <div class="flex justify-end items-center gap-3 pt-4 border-t border-slate-100 mt-6">
                <a href="<?= site_url('products'); ?>" class="px-4 py-2 text-sm text-slate-600 hover:text-slate-900 font-medium transition">Cancel</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-5 py-2 rounded-lg transition duration-150 shadow-sm">Update Product</button>
            </div>
        </form>
    </div>
</body>
</html>