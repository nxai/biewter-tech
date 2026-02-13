<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Biewter Tech</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --brand-blue: #155a9a;
            --brand-orange: #f38d25;
            --brand-dark: #0f172a;
        }
        body { font-family: 'Noto Sans Lao', sans-serif; background-color: #f1f5f9; }

        /* Sidebar: Blue Background with Orange Accent */
        .sidebar { 
            background-color: var(--brand-blue); 
            border-right: 4px solid var(--brand-orange); 
        }

        /* Active Navigation */
        .nav-active { 
            background-color: rgba(243, 141, 37, 0.15) !important; 
            border-left: 5px solid var(--brand-orange);
            color: var(--brand-orange) !important;
            font-weight: bold;
        }

        .nav-link-custom:hover { 
            background-color: rgba(255, 255, 255, 0.05);
            color: var(--brand-orange);
        }

        /* Admin Header */
        .admin-header { background: white; border-bottom: 1px solid #e2e8f0; }
    </style>
</head>
<body class="antialiased">
    <div class="flex h-screen overflow-hidden">
        
        <aside class="sidebar w-72 flex-shrink-0 flex flex-col text-white shadow-xl z-30">
            <div class="p-6 border-b border-white/10 text-center">
        <a href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('images/BiewterTech_Primary-white.png') }}" alt="Biewter Tech Admin" class="mx-auto" style="height: 48px; width: auto;">
        </a>
        <p class="text-[10px] uppercase tracking-[0.2em] font-bold mt-2" style="color: #f38d25;">Control Panel</p>
    </div>

            <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
               <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all nav-link-custom {{ request()->routeIs('admin.dashboard') ? 'nav-active' : '' }}">
    <i class="fa-solid fa-chart-line"></i> <span>Dashboard</span>
</a>
                <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all nav-link-custom {{ request()->routeIs('admin.products.*') ? 'nav-active' : '' }}">
                    <i class="fa-solid fa-box"></i> <span>ຈັດການສິນຄ້າ</span>
                </a>
                <a href="{{ route('admin.bookings') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all nav-link-custom {{ request()->routeIs('admin.bookings') ? 'nav-active' : '' }}">
                    <i class="fa-solid fa-calendar-check"></i> <span>ລາຍການຈອງ</span>
                </a>
                <a href="{{ route('admin.portfolio.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.portfolio.*') ? 'bg-white/10 text-[#f38d25]' : 'text-white/70' }}">
        <i class="fa-solid fa-images w-5 text-center"></i> <span>ຈັດການຜົນງານ</span>
    </a>
                <a href="{{ route('admin.exchange-rate.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all nav-link-custom {{ request()->routeIs('admin.exchange-rate.*') ? 'nav-active' : '' }}">
    <i class="fa-solid fa-coins w-5"></i> <span>ຈັດການເລດເງິນ</span>
</a>
                <div class="pt-4 mt-4 border-t border-white/10 opacity-50">
                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:text-orange-400">
                        <i class="fa-solid fa-user-gear"></i> <span>ໂປຣຟາຍ</span>
                    </a>
                </div>
            </nav>

            <div class="p-4 border-t border-white/10">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-red-300 hover:bg-red-500/10 transition font-bold">
                        <i class="fa-solid fa-power-off"></i> <span>ອອກຈາກລະບົບ</span>
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="admin-header h-20 px-8 flex items-center justify-between">
                <h2 class="text-xl font-bold text-slate-800">{{ $header ?? 'ຍິນດີຕ້ອນຮັບ' }}</h2>
                <div class="flex items-center gap-3 border-l pl-6">
                    <div class="text-right">
                        <p class="text-sm font-bold text-slate-700 leading-none">{{ Auth::user()->name }}</p>
                        <span class="text-[10px] text-orange-500 font-bold uppercase">Administrator</span>
                    </div>
                    <div class="w-10 h-10 rounded-full border-2 border-orange-500 p-0.5">
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=155a9a&color=fff" class="w-full h-full rounded-full">
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-8">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>