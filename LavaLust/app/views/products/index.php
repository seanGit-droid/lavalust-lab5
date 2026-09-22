<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Products List - Inventory Suite</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen p-6 sm:p-10">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Product Management</h1>
                <p class="text-xs text-slate-500 mt-1">Overview of available store inventory</p>
            </div>
            <div class="flex items-center gap-2">
                <a href="<?= site_url('products/create'); ?>" class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg font-medium transition duration-150 shadow-sm">+ Add Product</a>
                <a href="<?= site_url('logout'); ?>" onclick="return confirm('Are you sure you want to logout?');" class="bg-slate-200 hover:bg-slate-300 text-slate-700 text-sm px-4 py-2 rounded-lg font-medium transition duration-150">Logout</a>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-slate-200">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 border-b border-slate-200 text-slate-500 uppercase text-[11px] tracking-wider font-semibold">
=======
    <title>Products List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen p-8">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-indigo-400">Products List</h1>
            <div class="space-x-2">
                <a href="<?= site_url('products/create'); ?>" class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-lg font-medium transition duration-200 shadow-md hover:shadow-indigo-500/20">+ Add Product</a>
                <a href="<?= site_url('logout'); ?>" onclick="return confirm('Are you sure you want to logout?');" class="bg-red-600 hover:bg-red-500 text-white px-4 py-2 rounded-lg font-medium transition duration-200 shadow-md hover:shadow-red-500/20">Logout</a>
            </div>
        </div>

        <div class="bg-gray-800 rounded-xl shadow-xl overflow-hidden border border-gray-700">
            <table class="w-full text-left">
                <thead class="bg-gray-700/50 text-gray-300 uppercase text-xs">
>>>>>>> 08eae6d04971826e8153e702e6c1c05b634b5a87
                    <tr>
                        <th class="p-4">Name</th>
                        <th class="p-4">Description</th>
                        <th class="p-4">Price</th>
                        <th class="p-4">Qty</th>
                        <th class="p-4 text-center">Actions</th>
                    </tr>
                </thead>
<<<<<<< HEAD
                <tbody class="divide-y divide-slate-100 text-sm">
                    <?php if(!empty($products)): foreach($products as $p): ?>
                        <tr class="hover:bg-slate-50/80 transition duration-150">
                            <td class="p-4 font-semibold text-slate-900"><?= htmlspecialchars($p['product_name']); ?></td>
                            <td class="p-4 text-slate-500 text-xs max-w-xs truncate"><?= htmlspecialchars($p['description']); ?></td>
                            <td class="p-4 text-slate-900 font-medium">₱<?= number_format($p['price'], 2); ?></td>
                            <td class="p-4 text-slate-600"><?= $p['quantity']; ?></td>
                            <td class="p-4 text-center space-x-3">
                                <a href="<?= site_url('products/edit/' . $p['id']); ?>" class="text-blue-600 hover:text-blue-800 font-medium text-xs transition">Edit</a>
                                <a href="<?= site_url('products/delete/' . $p['id']); ?>" onclick="return confirm('Are you sure you want to delete this product?')" class="text-rose-600 hover:text-rose-800 font-medium text-xs transition">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="5" class="p-8 text-center text-slate-400 text-xs">No products found. Click + Add Product to start.</td></tr>
=======
                <tbody class="divide-y divide-gray-700">
                    <?php if(!empty($products)): foreach($products as $p): ?>
                        <tr class="hover:bg-gray-700/30 transition duration-150">
                            <td class="p-4 font-semibold text-white"><?= htmlspecialchars($p['product_name']); ?></td>
                            <td class="p-4 text-gray-400"><?= htmlspecialchars($p['description']); ?></td>
                            <td class="p-4 text-emerald-400 font-medium">₱<?= number_format($p['price'], 2); ?></td>
                            <td class="p-4"><?= $p['quantity']; ?></td>
                            <td class="p-4 text-center space-x-3">
                                <a href="<?= site_url('products/edit/' . $p['id']); ?>" class="text-indigo-400 hover:text-indigo-300 font-medium transition">Edit</a>
                                <a href="<?= site_url('products/delete/' . $p['id']); ?>" onclick="return confirm('Are you sure you want to delete this product?')" class="text-red-400 hover:text-red-300 font-medium transition">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="5" class="p-4 text-center text-gray-500">No products found.</td></tr>
>>>>>>> 08eae6d04971826e8153e702e6c1c05b634b5a87
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>