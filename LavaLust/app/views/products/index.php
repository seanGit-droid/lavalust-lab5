<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title ?? 'Products Management'); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen p-6 sm:p-10">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Product Management</h1>
                <p class="text-xs text-slate-500 mt-1">Logged in as <span class="font-semibold text-slate-700"><?= htmlspecialchars($username ?? 'Admin'); ?></span></p>
            </div>
            <div class="flex items-center gap-3">
                <a href="<?= site_url('products/create'); ?>" 
                    class="inline-flex items-center gap-1.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Add Product
                </a>
                <a href="<?= site_url('logout'); ?>" 
                    onclick="return confirm('Are you sure you want to log out?');" 
                    class="inline-flex items-center gap-1.5 bg-white border border-slate-200 hover:bg-slate-100 text-slate-700 text-sm font-medium px-4 py-2.5 rounded-xl transition shadow-sm">
                    Logout
                </a>
            </div>
        </div>

        <!-- Flash Messages -->
        <?php if(!empty($success)): ?>
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl text-sm mb-6 flex items-center gap-2">
                <svg class="w-5 h-5 flex-shrink-0 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span><?= htmlspecialchars($success); ?></span>
            </div>
        <?php endif; ?>

        <?php if(!empty($error)): ?>
            <div class="bg-rose-50 border border-rose-200 text-rose-600 px-4 py-3 rounded-xl text-sm mb-6 flex items-center gap-2">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span><?= htmlspecialchars($error); ?></span>
            </div>
        <?php endif; ?>

        <!-- Products Table -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/80 border-b border-slate-200 text-slate-500 uppercase text-[11px] tracking-wider font-semibold">
                            <th class="py-3.5 px-5">ID</th>
                            <th class="py-3.5 px-5">Product Name</th>
                            <th class="py-3.5 px-5">Description</th>
                            <th class="py-3.5 px-5">Price</th>
                            <th class="py-3.5 px-5">Stock Qty</th>
                            <th class="py-3.5 px-5 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        <?php if(!empty($products)): foreach($products as $p): ?>
                            <tr class="hover:bg-slate-50/70 transition duration-150">
                                <td class="py-3.5 px-5 text-slate-400 font-mono text-xs">#<?= htmlspecialchars($p['id'] ?? ''); ?></td>
                                <td class="py-3.5 px-5 font-semibold text-slate-900"><?= htmlspecialchars($p['product_name'] ?? ''); ?></td>
                                <td class="py-3.5 px-5 text-slate-500 text-xs max-w-sm truncate"><?= htmlspecialchars($p['description'] ?? ''); ?></td>
                                <td class="py-3.5 px-5 font-semibold text-emerald-600">₱<?= number_format((float)($p['price'] ?? 0), 2); ?></td>
                                <td class="py-3.5 px-5 text-slate-700">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800">
                                        <?= htmlspecialchars($p['quantity'] ?? 0); ?>
                                    </span>
                                </td>
                                <td class="py-3.5 px-5 text-center space-x-2">
                                    <a href="<?= site_url('products/edit/' . $p['id']); ?>" 
                                        class="inline-block bg-indigo-50 hover:bg-indigo-100 text-indigo-700 text-xs font-semibold px-3 py-1.5 rounded-lg transition">
                                        Edit
                                    </a>
                                    <a href="<?= site_url('products/delete/' . $p['id']); ?>" 
                                        onclick="return confirm('Are you sure you want to delete this product?');" 
                                        class="inline-block bg-rose-50 hover:bg-rose-100 text-rose-600 text-xs font-semibold px-3 py-1.5 rounded-lg transition">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; else: ?>
                            <tr>
                                <td colspan="6" class="p-12 text-center text-slate-400 text-sm">
                                    No products found in the database. Click <strong>+ Add Product</strong> to create one.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
