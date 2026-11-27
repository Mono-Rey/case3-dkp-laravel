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
                @forelse($items as $item)
                    <tr class="hover:bg-red-950/20 transition" wire:key="item-row-{{ $item->id }}">
                        <td class="p-3 text-sm text-gray-400">{{ $loop->iteration }}</td>
                        <td class="p-3 text-sm font-medium text-white">{{ $item->name }}</td>
                        <td class="p-3 text-sm text-gray-300">{{ $item->description }}</td>
                        <td class="p-3 text-sm text-gray-300">{{ $item->stock }}</td>
                        <td class="p-3 text-sm text-center space-x-2">
                            <button wire:click="edit({{ $item->id }})" style="background-color: #d97706; color: #ffffff;" class="px-3 py-1 rounded text-xs transition hover:opacity-90">
                                Edit
                            </button>

                            <button wire:click="delete({{ $item->id }})" style="background-color: #b91c1c; color: #ffffff;" class="px-3 py-1 rounded text-xs transition hover:opacity-90">
                                Soft Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-4 text-center text-gray-500">Belum ada data barang.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- POP-UP MODAL VALIDASI -->
    @if($showModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/75 backdrop-blur-sm p-4">
            <div style="background-color: #121212; border: 1px solid #7f1d1d;" class="w-full max-w-lg rounded-lg p-6 shadow-2xl text-white space-y-6">
                <div>
                    <h3 style="color: #ef4444;" class="text-xl font-bold">{{ $isEdit ? 'Edit Barang' : 'Tambah Barang Baru' }}</h3>
                    <p class="text-sm text-gray-400">Silakan isi form di bawah ini dengan lengkap.</p>
                </div>

                <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="space-y-4">
                    <!-- Input Nama Barang -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300">Nama Barang <span class="text-red-500">*</span></label>
                        <input type="text" wire:model.blur="name" style="background-color: #000000; border-color: {{ $errors->has('name') ? '#ef4444' : '#7f1d1d' }}; color: #ffffff;" class="mt-1 block w-full border rounded-md p-2.5 focus:outline-none">
                        @error('name') 
                            <span class="text-red-500 text-xs mt-1 font-semibold block">{{ $message }}</span> 
                        @enderror
                    </div>

                    <!-- Input Stok -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300">Stok <span class="text-red-500">*</span></label>
                        <input type="number" wire:model.blur="stock" style="background-color: #000000; border-color: {{ $errors->has('stock') ? '#ef4444' : '#7f1d1d' }}; color: #ffffff;" class="mt-1 block w-full border rounded-md p-2.5 focus:outline-none">
                        @error('stock') 
                            <span class="text-red-500 text-xs mt-1 font-semibold block">{{ $message }}</span> 
                        @enderror
                    </div>

                    <!-- Input Deskripsi -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300">Deskripsi</label>
                        <input type="text" wire:model.blur="description" style="background-color: #000000; border-color: {{ $errors->has('description') ? '#ef4444' : '#7f1d1d' }}; color: #ffffff;" class="mt-1 block w-full border rounded-md p-2.5 focus:outline-none">
                        @error('description') 
                            <span class="text-red-500 text-xs mt-1 font-semibold block">{{ $message }}</span> 
                        @enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex justify-end space-x-2 pt-4">
                        <button type="button" wire:click="closeModal" style="background-color: #3f3f46; color: #ffffff;" class="px-4 py-2 rounded-md font-semibold transition hover:opacity-90">
                            Batal
                        </button>

                        <button type="submit" style="background-color: #991b1b; color: #ffffff;" class="px-4 py-2 rounded-md font-semibold transition hover:opacity-90">
                            {{ $isEdit ? 'Perbarui Data' : 'Simpan Data' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>