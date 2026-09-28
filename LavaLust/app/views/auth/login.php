<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title ?? 'Login - Products Management'); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-200/80 w-full max-w-md transition-all">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-indigo-50 text-indigo-600 mb-3.5 shadow-sm">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
            </div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900">Welcome Back</h2>
            <p class="text-sm text-slate-500 mt-1">Please sign in to access your dashboard</p>
        </div>
        
        <?php 
            $displayError = $error ?? $_SESSION['error'] ?? $_SESSION['auth_error'] ?? null;
            if ($displayError): 
        ?>
            <div class="bg-rose-50 border border-rose-200 text-rose-600 px-4 py-3 rounded-xl text-sm mb-6 flex items-center gap-2">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span><?= htmlspecialchars($displayError); ?></span>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('login'); ?>" method="POST" class="space-y-4">
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1.5">Username</label>
                <input type="text" name="username" placeholder="Enter your username" required autofocus
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 focus:bg-white transition duration-200">
            </div>
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1.5">Password</label>
                <input type="password" name="password" placeholder="••••••••" required
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 focus:bg-white transition duration-200">
            </div>
            <button type="submit" 
                class="w-full bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white font-semibold py-3 rounded-xl text-sm transition duration-200 shadow-md shadow-indigo-500/20 mt-2">
                Sign In
            </button>
        </form>
    </div>
</body>
</html>