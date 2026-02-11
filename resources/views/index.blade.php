@extends('layouts.main')

@section('title', 'ໜ້າຫຼັກ')

@section('content')
<header class="hero-section text-center">
    <div class="container">
        <h1 class="display-3 fw-bold">Biewter Tech</h1>
        <p class="lead mb-4">ມາດຕະຖານວິຊາການ ບໍລິການດ້ວຍໃຈ ໂດຍທີມງານນັກສຶກສາ ແລະ ອາຈານຜູ້ຊ່ຽວຊານ</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="/contact" class="btn btn-warning btn-lg px-4 gap-3 fw-bold rounded-pill">ປຶກສາຕິດຕັ້ງຟຣີ</a>
            <a href="#services" class="btn btn-outline-light btn-lg px-4 fw-bold rounded-pill">ເບິ່ງສິນຄ້າ</a>
        </div>
    </div>
</header>

<section id="services" class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="fw-bold mb-5">ບໍລິການຂອງພວກເຮົາ</h2>
        <div class="row g-4">
            @foreach($services as $service)
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm p-4" style="border-radius: 15px;">
                    <div class="text-primary mb-3">
                        <i class="fas {{ $service->icon }} fa-3x"></i> </div>
                    <h4 class="fw-bold">{{ $service->name }}</h4>
                    <p class="text-muted small">{{ $service->description }}</p>
                    <p class="text-primary fw-bold">ລາຄາ: {{ $service->price_range }} ບາດ</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection