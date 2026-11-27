<!-- Box Card Login -->
<div style="background-color: #121212; border-color: #7f1d1d;" class="max-w-md mx-auto mt-10 border p-6 rounded-lg shadow-2xl text-white">
    <h2 style="color: #ef4444;" class="text-2xl font-bold mb-6 text-center">Login Sistem DKP</h2>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->has('error')): ?>
        <div style="background-color: #180303; border-color: #b91c1c; color: #fca5a5;" class="border px-4 py-2 rounded mb-4 text-sm">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <form wire:submit.prevent="login" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-300">Alamat Email</label>
            <input type="email" wire:model="email" style="background-color: #000000; border-color: #7f1d1d; color: #ffffff;" class="mt-1 block w-full border rounded-md p-2.5 focus:outline-none">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs mt-1 block"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-300">Password</label>
            <input type="password" wire:model="password" style="background-color: #000000; border-color: #7f1d1d; color: #ffffff;" class="mt-1 block w-full border rounded-md p-2.5 focus:outline-none">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs mt-1 block"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <button type="submit" style="background-color: #991b1b; color: #ffffff;" class="w-full py-2.5 rounded-md font-semibold transition duration-200 shadow-md hover:opacity-90">
            Masuk
        </button>
    </form>

    <p class="mt-4 text-sm text-center text-gray-400">
        Belum punya akun? <a href="<?php echo e(route('register')); ?>" style="color: #ef4444;" class="font-semibold hover:underline">Registrasi di sini</a>
    </p>
</div><?php /**PATH D:\laragon\www\case3-dkp\resources\views/livewire/login-page.blade.php ENDPATH**/ ?>