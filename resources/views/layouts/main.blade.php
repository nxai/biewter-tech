<!DOCTYPE html>
<html lang="lo">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biewter Tech - IT Solution & CCTV Service</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --brand-blue: #155a9a;   /* ສີຟ້າຫຼັກ */
            --brand-orange: #f38d25; /* ສີສົ້ມເນັ້ນ */
            --bg-light: #f8fafc;
        }

        body { font-family: 'Noto Sans Lao', sans-serif; background-color: var(--bg-light); color: #334155; }

        /* Navbar */
        .navbar { background: rgba(255, 255, 255, 0.95); border-bottom: 3px solid var(--brand-blue); padding: 15px 0; }
        .nav-link { color: var(--brand-blue) !important; font-weight: 700; transition: 0.3s; }
        .nav-link:hover { color: var(--brand-orange) !important; }

        /* Buttons */
        .btn-cta { 
            background-color: var(--brand-orange); 
            color: white; 
            border-radius: 50px; 
            font-weight: 700; 
            padding: 10px 25px; 
            border: none;
            transition: 0.3s;
        }
        .btn-cta:hover { background-color: #d9791b; color: white; transform: scale(1.05); shadow: 0 5px 15px rgba(243, 141, 37, 0.4); }

        /* Footer */
        .footer { background-color: var(--brand-blue); color: white; padding: 60px 0 30px; }
        .footer h6 { color: var(--brand-orange); font-weight: 800; margin-bottom: 20px; text-transform: uppercase; }
        .footer-link { color: rgba(255,255,255,0.8); text-decoration: none; transition: 0.2s; }
        .footer-link:hover { color: var(--brand-orange); padding-left: 5px; }

    .search-input:focus {
        border-color: #f38d25 !important;
        box-shadow: none;
    }
    .search-input:focus + .search-btn {
        background-color: #f38d25 !important;
        border-color: #f38d25 !important;
    }
    .rounded-pill-start { border-radius: 50px 0 0 50px; }
    .rounded-pill-end { border-radius: 0 50px 50px 0; }
    .transition-all { transition: all 0.3s ease; }
</style>
</head>
<body>

    <nav class="navbar navbar-expand-lg sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/BiewterTech_Primary.png') }}" alt="Biewter Tech Logo" style="height: 50px; width: auto;">
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="fa-solid fa-bars text-blue"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fw-bold">
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('services') ? 'text-[#f38d25]' : '' }}" href="{{ route('services') }}">ບໍລິການ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('products.*') ? 'text-[#f38d25]' : '' }}" href="{{ route('products.index') }}">ສິນຄ້າ</a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('portfolio') ? 'text-[#f38d25]' : 'text-dark' }}" href="{{ route('portfolio') }}">ຜົນງານ</a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('about') ? 'text-[#f38d25]' : '' }}" href="{{ route('about') }}">ກ່ຽວກັບເຮົາ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('contact.*') ? 'text-[#f38d25]' : '' }}" href="{{ route('contact.index') }}">ຕິດຕໍ່ເຮົາ</a>
    </li>
    <form action="{{ route('products.index') }}" method="GET" class="d-flex position-relative ms-lg-3">
    <div class="input-group">
        <input type="text" name="search" value="{{ request('search') }}" 
               class="form-control border-2 rounded-pill-start ps-4 search-input" 
               placeholder="ຄົ້ນຫາສິນຄ້າ..." 
               style="border-color: #155a9a; border-right: none;">
        <button class="btn px-4 rounded-pill-end shadow-sm transition-all search-btn" type="submit" 
                style="background-color: #155a9a; color: white; border: 2px solid #155a9a;">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </div>
</form>
</ul>
            </div>
        </div>
    </nav>

    <main>@yield('content')</main>

    <footer class="footer mt-5">
        <div class="container text-center text-md-start">
            <div class="row g-4">
                <div class="col-md-4">
                    <img src="{{ asset('images/BiewterTech_Primary-white.png') }}" alt="Biewter Tech White" style="height: 45px; width: auto;" class="mb-4">
                    <p class="small opacity-75">ບໍລິການຕິດຕັ້ງກ້ອງວົງຈອນປິດ ແລະ ລະບົບ Network ມືອາຊີບ ໃນຫຼວງພະບາງ.</p>
                </div>
                <div class="col-md-2 ms-auto">
                    <h6>Menu</h6>
                    <div class="d-grid gap-2">
                        <a href="/products" class="footer-link">ສິນຄ້າ</a>
                        <a href="/services" class="footer-link">ບໍລິການ</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h6>Contact</h6>
                    <p class="small mb-1"><i class="fa-solid fa-location-dot me-2"></i> ນະຄອນຫຼວງພະບາງ, ສປປ ລາວ</p>
                    <p class="small"><i class="fa-solid fa-phone me-2"></i> +856 20 7787 2577</p>
                </div>
            </div>
            <hr class="mt-5 opacity-25">
            <p class="text-center small opacity-50 mb-0">&copy; {{ date('Y') }} Biewter Tech. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>