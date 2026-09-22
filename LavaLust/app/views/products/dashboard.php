<?php /** @var string $pageTitle */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Inventory Management' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-50 min-h-screen py-10 px-4 sm:px-8 font-sans text-slate-800">
    <div class="max-w-6xl mx-auto">
        <!-- Header Section -->
        <div class="bg-white border border-slate-200 rounded-xl p-6 mb-8 shadow-sm flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 flex items-center gap-2.5">
                    <i class="fa-solid fa-boxes-stacked text-blue-600"></i> Inventory Suite
                </h1>
                <p class="text-xs text-slate-500 mt-1">Manage and track product stock levels</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="<?= site_url('products/add_item') ?>" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition shadow-sm flex items-center gap-2">
                    <i class="fa-solid fa-plus text-xs"></i> New Item
                </a>
                <a href="<?= site_url('logout') ?>" class="bg-slate-100 hover:bg-slate-200 text-slate-600 text-sm font-medium px-4 py-2 rounded-lg transition">
                    Logout
                </a>
            </div>
        </div>

        <!-- Inventory Grid Cards View -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if (!empty($items)): foreach ($items as $row): ?>
                    <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-sm hover:border-slate-300 transition flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-start mb-3 gap-2">
                                <h3 class="text-base font-semibold text-slate-900 tracking-tight"><?= htmlspecialchars($row['product_name']) ?></h3>
                                <span class="bg-blue-50 text-blue-700 font-medium text-xs px-2.5 py-1 rounded-md border border-blue-100">
                                    Qty: <?= $row['quantity'] ?>
                                </span>
                            </div>
                            <p class="text-slate-500 text-xs mb-4 line-clamp-2 leading-relaxed"><?= htmlspecialchars($row['description']) ?></p>
                        </div>
                        <div>
                            <div class="text-xl font-bold text-slate-900 mb-4">
                                ₱<?= number_format($row['price'], 2) ?>
                            </div>
                            <div class="flex items-center gap-2 border-t border-slate-100 pt-4">
                                <a href="<?= site_url('products/modify_item?id=' . $row['id']) ?>" class="flex-1 text-center bg-slate-50 hover:bg-slate-100 text-slate-700 font-medium py-1.5 rounded-md border border-slate-200 text-xs transition">
                                    <i class="fa-solid fa-pen-to-square mr-1"></i> Edit
                                </a>
                                <a href="<?= site_url('products/remove_item?id=' . $row['id']) ?>" onclick="return confirm('Delete this item?')" class="bg-rose-50 hover:bg-rose-100 text-rose-600 px-3 py-1.5 rounded-md text-xs transition border border-rose-100">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
            else: ?>
                <div class="col-span-full bg-white border border-slate-200 rounded-xl p-12 text-center text-slate-400">
                    <i class="fa-solid fa-box-open text-4xl mb-3 block text-slate-300"></i>
                    No items found in the inventory yet.
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>