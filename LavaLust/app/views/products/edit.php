<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title ?? 'Edit Product'); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-200/80 w-full max-w-lg transition-all">
        <div class="mb-6">
            <h2 class="text-2xl font-bold tracking-tight text-slate-900">Edit Product</h2>
            <p class="text-xs text-slate-500 mt-1">Update details for product <span class="font-mono font-semibold text-slate-700">#<?= htmlspecialchars($product['id'] ?? ''); ?></span></p>
        </div>

        <?php if(!empty($error)): ?>
            <div class="bg-rose-50 border border-rose-200 text-rose-600 px-4 py-3 rounded-xl text-sm mb-6 flex items-center gap-2">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span><?= htmlspecialchars($error); ?></span>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('products/edit/' . $product['id']); ?>" method="POST" class="space-y-4">
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1.5">Product Name</label>
                <input type="text" name="product_name" value="<?= htmlspecialchars($product['product_name'] ?? ''); ?>" required autofocus
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 focus:bg-white transition duration-200">
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1.5">Description</label>
                <textarea name="description" rows="3"
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 focus:bg-white transition duration-200"><?= htmlspecialchars($product['description'] ?? ''); ?></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1.5">Price (₱)</label>
                    <input type="number" step="0.01" name="price" value="<?= htmlspecialchars($product['price'] ?? ''); ?>" required
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 focus:bg-white transition duration-200">
                </div>
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1.5">Quantity</label>
                    <input type="number" name="quantity" value="<?= htmlspecialchars($product['quantity'] ?? ''); ?>" required
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 focus:bg-white transition duration-200">
                </div>
            </div>

            <div class="flex justify-end items-center gap-3 pt-4 border-t border-slate-100 mt-6">
                <a href="<?= site_url('products'); ?>" 
                    class="px-4 py-2.5 text-sm text-slate-600 hover:text-slate-900 font-medium transition">
                    Cancel
                </a>
                <button type="submit" 
                    class="bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white font-semibold px-6 py-2.5 rounded-xl text-sm transition duration-200 shadow-md shadow-indigo-500/20">
                    Update Product
                </button>
            </div>
        </form>
    </div>
</body>
</html>
