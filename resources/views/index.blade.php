@extends('layouts.main')

@section('content')
<section class="hero-section py-5 shadow-inner" style="background: linear-gradient(145deg, #155a9a 0%, #0c3d69 100%); min-height: 500px; display: flex; align-items: center;">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 text-white">
                <span class="badge px-3 py-2 mb-3 shadow-sm" style="background-color: #f38d25;">
                    <i class="fa-solid fa-shield-halved me-2"></i> No.1 IT & CCTV in Luang Prabang
                </span>
                <h1 class="display-4 fw-black mb-4 tracking-tighter" style="line-height: 1.1;">
                    ຍົກລະດັບຄວາມປອດໄພ <br> <span style="color: #f38d25;">ດ້ວຍເຕັກໂນໂລຊີທີ່ທັນສະໄໝ</span>
                </h1>
                <p class="lead opacity-75 mb-5 font-light">
                    Biewter Tech ບໍລິການຕິດຕັ້ງກ້ອງວົງຈອນປິດ, ລະບົບເຄືອຂ່າຍ ແລະ ອຸປະກອນໄອທີຄົບວົງຈອນ ດ້ວຍປະສົບການມືອາຊີບ.
                </p>
                <div class="d-flex gap-3">
                    <a href="#products" class="btn btn-lg px-5 rounded-pill shadow-lg transition-all" style="background-color: #f38d25; color: white; font-weight: 800;">
                        ເລືອກຊື້ສິນຄ້າ
                    </a>
                    <a href="/services" class="btn btn-lg px-5 rounded-pill border-2 transition-all" style="border-color: white; color: white; font-weight: 700;">
                        ບໍລິການຂອງເຮົາ
                    </a>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block text-center">
                <img src="{{ asset('images/hero-cctv.png') }}" class="img-fluid drop-shadow" alt="CCTV Technology">
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="p-5 rounded-4 hover-shadow transition-all border-0 card h-100 shadow-sm">
    <i class="fa-solid fa-video mb-4 display-4" style="color: #155a9a;"></i>
    <h5 class="fw-bold">ຕິດຕັ້ງກ້ອງ CCTV</h5>
    <p class="text-muted small">ກ້ອງຄວາມລະອຽດສູງ ເບິ່ງຜ່ານມືຖືໄດ້ທຸກບ່ອນ ພ້ອມບໍລິການຫຼັງການຂາຍ.</p>
</div>
            </div>
            <div class="col-md-4">
                <div class="p-5 rounded-4 hover-shadow transition-all border-0 card h-100">
                    <i class="fa-solid fa-network-wired mb-4 display-4" style="color: #f38d25;"></i>
                    <h5 class="fw-bold">ລະບົບ Network & Wi-Fi</h5>
                    <p class="text-muted small">ວາງລະບົບອິນເຕີເນັດໃຫ້ແຮງ ແລະ ຄວບຄຸມທົ່ວເຖິງ ທັງເຮືອນ ແລະ ສຳນັກງານ.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-5 rounded-4 hover-shadow transition-all border-0 card h-100">
                    <i class="fa-solid fa-microchip mb-4 display-4" style="color: #155a9a;"></i>
                    <h5 class="fw-bold">IT Solutions</h5>
                    <p class="text-muted small">ຈຳໜ່າຍ ແລະ ຊ້ອມແປງອຸປະກອນຄອມພິວເຕີ ໂດຍທີມງານຊ່ຽວຊານ.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="products" class="py-5" style="background-color: #f1f5f9;">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div>
                <h2 class="fw-black text-dark tracking-tighter m-0">ສິນຄ້າມາໃໝ່</h2>
                <div class="h-1 w-50 mt-2" style="background-color: #f38d25;"></div>
            </div>
            <a href="/products" class="text-decoration-none fw-bold" style="color: #155a9a;">ເບິ່ງທັງໝົດ <i class="fa-solid fa-arrow-right"></i></a>
        </div>

        <div class="row g-4">
            @foreach($products as $product)
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden product-card transition-all">
                    <div class="position-relative">
                        @if($product->images->count() > 0)
                            <img src="{{ asset('storage/'.$product->images->first()->image_path) }}" class="card-img-top p-2 rounded-4" style="height:220px; object-fit:cover;">
                        @endif
                        <div class="stock-label">
                            @if($product->stock > 0)
                                <span class="badge rounded-pill bg-success">ມີສິນຄ້າ</span>
                            @else
                                <span class="badge rounded-pill bg-danger">ໝົດ</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <h6 class="fw-bold text-dark text-truncate">{{ $product->name }}</h6>
                        
                        <div class="price-box my-3">
                            <div class="h5 fw-black m-0" style="color: #f38d25;">{{ number_format($product->price) }} ฿</div>
                            <div class="small fw-bold opacity-50" style="color: #155a9a;">≈ {{ number_format($product->price * $rate) }} ກີບ</div>
                        </div>

                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-brand-outline w-100 rounded-pill fw-bold">ລາຍລະອຽດ</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .fw-black { font-weight: 900; }
    .drop-shadow { filter: drop-shadow(0 20px 30px rgba(0,0,0,0.3)); }
    .hover-shadow:hover { box-shadow: 0 20px 40px rgba(21, 90, 154, 0.1); transform: translateY(-5px); }
    .product-card:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important; }
    .btn-brand-outline { border: 2px solid #155a9a; color: #155a9a; transition: 0.3s; }
    .btn-brand-outline:hover { background-color: #155a9a; color: white; }
    .stock-label { position: absolute; top: 15px; right: 15px; }

    .card i {
    transition: all 0.3s ease;
}
.card:hover i {
    color: #f38d25 !important; /* ປ່ຽນເປັນສີສົ້ມຂອງແບຣນເວລາ Hover */
    transform: scale(1.1);
}
</style>
@endsection