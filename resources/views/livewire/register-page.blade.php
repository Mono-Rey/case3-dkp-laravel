<!-- Box Card Register -->
<div style="background-color: #121212; border-color: #7f1d1d;" class="max-w-md mx-auto mt-10 border p-6 rounded-lg shadow-2xl text-white">
    <h2 style="color: #ef4444;" class="text-2xl font-bold mb-6 text-center">Registrasi Akun Baru</h2>

    <form wire:submit.prevent="register" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-300">Nama Lengkap</label>
            <input type="text" wire:model="name" style="background-color: #000000; border-color: #7f1d1d; color: #ffffff;" class="mt-1 block w-full border rounded-md p-2.5 focus:outline-none">
            @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-300">Alamat Email</label>
            <input type="email" wire:model="email" style="background-color: #000000; border-color: #7f1d1d; color: #ffffff;" class="mt-1 block w-full border rounded-md p-2.5 focus:outline-none">
            @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-300">Password</label>
            <input type="password" wire:model="password" style="background-color: #000000; border-color: #7f1d1d; color: #ffffff;" class="mt-1 block w-full border rounded-md p-2.5 focus:outline-none">
            @error('password') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
        </div>

        <button type="submit" style="background-color: #991b1b; color: #ffffff;" class="w-full py-2.5 rounded-md font-semibold transition duration-200 shadow-md hover:opacity-90">
            Daftar Sekarang
        </button>
    </form>

    <p class="mt-4 text-sm text-center text-gray-400">
        Sudah punya akun? <a href="{{ route('login') }}" style="color: #ef4444;" class="font-semibold hover:underline">Login di sini</a>
    </p>
</div>