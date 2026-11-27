<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sistem DKP 2026' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<!-- Ubah background halaman utama di sini -->
<body style="background-color: #000000; color: #ffffff;" class="min-h-screen font-sans">

    <!-- Navbar Atas -->
    <nav style="background-color: #180303; border-color: #7f1d1d;" class="border-b p-4 shadow-lg">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 style="color: #ef4444;" class="text-xl font-bold tracking-wide">Sistem DKP 2026</h1>
            
            @auth
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-300">Halo, <strong class="text-white">{{ Auth::user()->name }}</strong></span>
                    <a href="{{ route('dashboard') }}" style="color: #f87171;" class="text-sm font-medium hover:underline">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" style="background-color: #991b1b; color: #ffffff;" class="px-3 py-1.5 rounded-md text-sm font-semibold transition hover:opacity-90">
                            Logout
                        </button>
                    </form>
                </div>
            @endauth
        </div>
    </nav>

    <!-- Konten Utama -->
    <main class="max-w-7xl mx-auto p-6">
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>