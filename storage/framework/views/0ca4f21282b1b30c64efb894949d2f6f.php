<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title ?? 'Sistem DKP 2026'); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>
<!-- Ubah background halaman utama di sini -->
<body style="background-color: #000000; color: #ffffff;" class="min-h-screen font-sans">

    <!-- Navbar Atas -->
    <nav style="background-color: #180303; border-color: #7f1d1d;" class="border-b p-4 shadow-lg">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 style="color: #ef4444;" class="text-xl font-bold tracking-wide">Sistem DKP 2026</h1>
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-300">Halo, <strong class="text-white"><?php echo e(Auth::user()->name); ?></strong></span>
                    <a href="<?php echo e(route('dashboard')); ?>" style="color: #f87171;" class="text-sm font-medium hover:underline">Dashboard</a>
                    <form action="<?php echo e(route('logout')); ?>" method="POST" class="inline">
                        <?php echo csrf_field(); ?>
                        <button type="submit" style="background-color: #991b1b; color: #ffffff;" class="px-3 py-1.5 rounded-md text-sm font-semibold transition hover:opacity-90">
                            Logout
                        </button>
                    </form>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </nav>

    <!-- Konten Utama -->
    <main class="max-w-7xl mx-auto p-6">
        <?php echo e($slot); ?>

    </main>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>
</html><?php /**PATH D:\laragon\www\case3-dkp\resources\views/components/layouts/app.blade.php ENDPATH**/ ?>