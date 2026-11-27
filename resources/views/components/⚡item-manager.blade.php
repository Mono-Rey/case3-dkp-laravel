<?php

use Livewire\Component;
use App\Models\Item;
use Illuminate\Support\Facades\Cache;

new class extends Component
{
    public $name = '';
    public $description = '';
    public $stock = '';
    public $item_id = null;
    public $isEdit = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'stock' => 'required|integer|min:0',
    ];

    public function with()
    {
        return [
            // Cache::remember untuk optimasi performa[cite: 1]
            'items' => Cache::remember('items_list', 60, function () {
                return Item::latest()->get();
            }),
        ];
    }

    public function store()
    {
        $this->validate();

        Item::create([
            'name' => $this->name,
            'description' => $this->description,
            'stock' => $this->stock,
        ]);

        Cache::forget('items_list'); // Hapus cache agar data terbaru langsung tampil[cite: 1]
        $this->resetInput();
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $this->item_id = $id;
        $this->name = $item->name;
        $this->description = $item->description;
        $this->stock = $item->stock;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->item_id) {
            $item = Item::findOrFail($this->item_id);
            $item->update([
                'name' => $this->name,
                'description' => $this->description,
                'stock' => $this->stock,
            ]);

            Cache::forget('items_list'); // Reset cache setelah update[cite: 1]
            $this->resetInput();
        }
    }

    public function delete($id)
    {
        Item::findOrFail($id)->delete(); // Soft Delete[cite: 1]
        Cache::forget('items_list'); // Reset cache setelah soft delete[cite: 1]
    }

    public function resetInput()
    {
        $this->name = '';
        $this->description = '';
        $this->stock = '';
        $this->item_id = null;
        $this->isEdit = false;
    }
};
?>

<x-layouts.app>
    <div class="space-y-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4 text-gray-800">{{ $isEdit ? 'Edit Barang' : 'Tambah Barang Baru' }}</h2>

            <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Barang</label>
                        <input type="text" wire:model="name" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                        @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Stok</label>
                        <input type="number" wire:model="stock" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                        @error('stock') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="md:col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <input type="text" wire:model="description" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                        @error('description') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="flex items-center space-x-2">
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 font-semibold transition">
                        {{ $isEdit ? 'Perbarui Data' : 'Simpan Data' }}
                    </button>
                    @if($isEdit)
                        <button type="button" wire:click="resetInput" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 font-semibold transition">
                            Batal
                        </button>
                    @endif
                </div>
            </form>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
            <h2 class="text-xl font-bold mb-4 text-gray-800">Daftar Barang (Fitur Cache Aktif)</h2>

            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="p-3 text-sm font-semibold text-gray-700">#</th>
                        <th class="p-3 text-sm font-semibold text-gray-700">Nama Barang</th>
                        <th class="p-3 text-sm font-semibold text-gray-700">Deskripsi</th>
                        <th class="p-3 text-sm font-semibold text-gray-700">Stok</th>
                        <th class="p-3 text-sm font-semibold text-gray-700 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $index => $item)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="p-3 text-sm text-gray-600">{{ $index + 1 }}</td>
                            <td class="p-3 text-sm font-medium text-gray-800">{{ $item->name }}</td>
                            <td class="p-3 text-sm text-gray-600">{{ $item->description }}</td>
                            <td class="p-3 text-sm text-gray-600">{{ $item->stock }}</td>
                            <td class="p-3 text-sm text-center space-x-2">
                                <button wire:click="edit({{ $item->id }})" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-xs transition">
                                    Edit
                                </button>
                                <button wire:click="delete({{ $item->id }})" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-xs transition">
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
    </div>
</x-layouts.app>