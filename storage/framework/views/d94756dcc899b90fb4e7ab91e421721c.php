<div class="space-y-6 text-white">
    <!-- Header & Tombol Tambah -->
    <div class="flex justify-between items-center">
        <h2 style="color: #ef4444;" class="text-xl font-bold">Daftar Barang</h2>
        
        <button wire:click="openModal" style="background-color: #991b1b; color: #ffffff;" class="px-4 py-2 rounded-md font-semibold transition hover:opacity-90 shadow-lg">
            + Tambah Barang Baru
        </button>
    </div>

    <!-- Tabel Data Barang -->
    <div style="background-color: #121212; border-color: #7f1d1d;" class="border p-6 rounded-lg shadow-xl overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr style="background-color: #000000; border-color: #7f1d1d;" class="border-b">
                    <th style="color: #f87171;" class="p-3 text-sm font-semibold">#</th>
                    <th style="color: #f87171;" class="p-3 text-sm font-semibold">Nama Barang</th>
                    <th style="color: #f87171;" class="p-3 text-sm font-semibold">Deskripsi</th>
                    <th style="color: #f87171;" class="p-3 text-sm font-semibold">Stok</th>
                    <th style="color: #f87171;" class="p-3 text-sm font-semibold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody style="border-color: #180303;" class="divide-y">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <tr class="hover:bg-red-950/20 transition" <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'item-row-'.e($item->id).''; ?>wire:key="item-row-<?php echo e($item->id); ?>">
                        <td class="p-3 text-sm text-gray-400"><?php echo e($loop->iteration); ?></td>
                        <td class="p-3 text-sm font-medium text-white"><?php echo e($item->name); ?></td>
                        <td class="p-3 text-sm text-gray-300"><?php echo e($item->description); ?></td>
                        <td class="p-3 text-sm text-gray-300"><?php echo e($item->stock); ?></td>
                        <td class="p-3 text-sm text-center space-x-2">
                            <button wire:click="edit(<?php echo e($item->id); ?>)" style="background-color: #d97706; color: #ffffff;" class="px-3 py-1 rounded text-xs transition hover:opacity-90">
                                Edit
                            </button>

                            <button wire:click="delete(<?php echo e($item->id); ?>)" style="background-color: #b91c1c; color: #ffffff;" class="px-3 py-1 rounded text-xs transition hover:opacity-90">
                                Soft Delete
                            </button>
                        </td>
                    </tr>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <tr>
                        <td colspan="5" class="p-4 text-center text-gray-500">Belum ada data barang.</td>
                    </tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- POP-UP MODAL VALIDASI -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showModal): ?>
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/75 backdrop-blur-sm p-4">
            <div style="background-color: #121212; border: 1px solid #7f1d1d;" class="w-full max-w-lg rounded-lg p-6 shadow-2xl text-white space-y-6">
                <div>
                    <h3 style="color: #ef4444;" class="text-xl font-bold"><?php echo e($isEdit ? 'Edit Barang' : 'Tambah Barang Baru'); ?></h3>
                    <p class="text-sm text-gray-400">Silakan isi form di bawah ini dengan lengkap.</p>
                </div>

                <form wire:submit.prevent="<?php echo e($isEdit ? 'update' : 'store'); ?>" class="space-y-4">
                    <!-- Input Nama Barang -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300">Nama Barang <span class="text-red-500">*</span></label>
                        <input type="text" wire:model.blur="name" style="background-color: #000000; border-color: <?php echo e($errors->has('name') ? '#ef4444' : '#7f1d1d'); ?>; color: #ffffff;" class="mt-1 block w-full border rounded-md p-2.5 focus:outline-none">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                            <span class="text-red-500 text-xs mt-1 font-semibold block"><?php echo e($message); ?></span> 
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <!-- Input Stok -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300">Stok <span class="text-red-500">*</span></label>
                        <input type="number" wire:model.blur="stock" style="background-color: #000000; border-color: <?php echo e($errors->has('stock') ? '#ef4444' : '#7f1d1d'); ?>; color: #ffffff;" class="mt-1 block w-full border rounded-md p-2.5 focus:outline-none">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                            <span class="text-red-500 text-xs mt-1 font-semibold block"><?php echo e($message); ?></span> 
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <!-- Input Deskripsi -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300">Deskripsi</label>
                        <input type="text" wire:model.blur="description" style="background-color: #000000; border-color: <?php echo e($errors->has('description') ? '#ef4444' : '#7f1d1d'); ?>; color: #ffffff;" class="mt-1 block w-full border rounded-md p-2.5 focus:outline-none">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                            <span class="text-red-500 text-xs mt-1 font-semibold block"><?php echo e($message); ?></span> 
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex justify-end space-x-2 pt-4">
                        <button type="button" wire:click="closeModal" style="background-color: #3f3f46; color: #ffffff;" class="px-4 py-2 rounded-md font-semibold transition hover:opacity-90">
                            Batal
                        </button>

                        <button type="submit" style="background-color: #991b1b; color: #ffffff;" class="px-4 py-2 rounded-md font-semibold transition hover:opacity-90">
                            <?php echo e($isEdit ? 'Perbarui Data' : 'Simpan Data'); ?>

                        </button>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div><?php /**PATH D:\laragon\www\case3-dkp\resources\views/livewire/item-manager.blade.php ENDPATH**/ ?>