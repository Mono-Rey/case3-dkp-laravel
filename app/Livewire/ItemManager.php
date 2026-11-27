<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;

class ItemManager extends Component
{
    public $name, $description, $stock, $item_id;
    public $isEdit = false;
    public $showModal = false;

    // 1. Aturan Validasi Input (Rules)
    protected $rules = [
        'name' => 'required|string|min:3|max:255',
        'description' => 'nullable|string|max:500',
        'stock' => 'required|numeric|integer|min:0',
    ];

    // 2. Pesan Error Kustom Bahasa Indonesia
    protected $messages = [
        'name.required' => 'Nama barang wajib diisi.',
        'name.min' => 'Nama barang minimal 3 karakter.',
        'name.max' => 'Nama barang maksimal 255 karakter.',
        'description.max' => 'Deskripsi maksimal 500 karakter.',
        'stock.required' => 'Jumlah stok wajib diisi.',
        'stock.numeric' => 'Stok harus berupa angka.',
        'stock.integer' => 'Stok harus berupa bilangan bulat.',
        'stock.min' => 'Stok tidak boleh kurang dari 0.',
    ];

    // 3. Validasi Real-time saat pengguna mengetik/pindah kolom input
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function openModal()
    {
        $this->resetInput();
        $this->resetValidation(); // Bersihkan sisa pesan error lama
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->resetInput();
        $this->resetValidation(); // Bersihkan sisa pesan error lama
        $this->showModal = false;
    }

    public function resetInput()
    {
        $this->name = '';
        $this->description = '';
        $this->stock = '';
        $this->item_id = null;
        $this->isEdit = false;
    }

    public function store()
    {
        // Jalankan validasi. Jika gagal, eksekusi berhenti di sini & modal tetap terbuka
        $this->validate();

        Item::create([
            'name' => $this->name,
            'description' => $this->description,
            'stock' => $this->stock,
        ]);

        $this->closeModal();
    }

    public function edit($id)
    {
        $item = Item::find($id);
        if (!$item) return;

        $this->resetValidation();
        $this->item_id = $item->id;
        $this->name = $item->name;
        $this->description = $item->description;
        $this->stock = $item->stock;
        $this->isEdit = true;
        $this->showModal = true;
    }

    public function update()
    {
        // Jalankan validasi saat perbarui data
        $this->validate();

        if ($this->item_id) {
            $item = Item::find($this->item_id);
            if ($item) {
                $item->update([
                    'name' => $this->name,
                    'description' => $this->description,
                    'stock' => $this->stock,
                ]);

                $this->closeModal();
            }
        }
    }

    public function delete($id)
    {
        $item = Item::find($id);
        if ($item) {
            $item->delete();
        }
    }

    public function render()
    {
        return view('livewire.item-manager', [
            'items' => Item::latest()->get()
        ])->layout('layouts.app');
    }
}