@extends('layouts.main')

@section('content')
<div class="py-5 mb-5 shadow-sm position-relative overflow-hidden" style="background: linear-gradient(135deg, #155a9a 0%, #0c3d69 100%);">
    <div class="container text-center py-5 text-white position-relative z-index-1">
        <h1 class="fw-black mb-2 tracking-tighter display-4" style="letter-spacing: -2px;">ສູນລວມອຸປະກອນ IT & ກ້ອງວົງຈອນປິດ</h1>
        <p class="lead opacity-75 mx-auto mb-0" style="max-width: 700px;">ບໍລິການຕິດຕັ້ງ ແລະ ຈຳໜ່າຍອຸປະກອນໄອທີຄົບວົງຈອນ ດ້ວຍມາດຕະຖານມືອາຊີບ ໃນນະຄອນຫຼວງພະບາງ</p>
    </div>
    <i class="fa-solid fa-microchip position-absolute end-0 bottom-0 m-n5 opacity-10" style="font-size: 20rem; color: white;"></i>
</div>

<div class="container py-5">
    @if(request('search'))
        <div class="mb-5 p-4 rounded-4 bg-light border-start border-4" style="border-color: #f38d25 !important;">
            <h4 class="fw-bold m-0">
                ຜົນການຄົ້ນຫາ: <span style="color: #f38d25;">"{{ request('search') }}"</span>
                <small class="text-muted fw-normal"> (ພົບ {{ $products->count() }} ລາຍການ)</small>
            </h4>
            <a href="{{ route('products.index') }}" class="text-decoration-none small text-primary mt-2 d-inline-block">
                <i class="fa-solid fa-rotate-left me-1"></i> ລ້າງການຄົ້ນຫາ
            </a>
        </div>
    @endif

    <div class="row g-4">
        @forelse($products as $product)
            <div class="col-6 col-md-4 col-lg-3">
                @include('components.product-card', ['product' => $product])
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <div class="opacity-25 mb-3">
                    <i class="fa-solid fa-box-open display-1"></i>
                </div>
                <h5 class="fw-bold text-muted">ບໍ່ພົບສິນຄ້າທີ່ທ່ານຄົ້ນຫາ</h5>
                <p class="text-muted small">ລອງໃຊ້ຄຳຄົ້ນຫາອື່ນ ຫຼື ກວດສອບຕົວສະກົດຄືນໃໝ່</p>
                <a href="{{ route('products.index') }}" class="btn rounded-pill px-5 py-2 mt-3 fw-bold" style="border: 2px solid #155a9a; color: #155a9a;">
                    ເບິ່ງສິນຄ້າທັງໝົດ
                </a>
            </div>
        @endforelse
    </div>
</div>

<style>
    .fw-black { font-weight: 900; }
    .tracking-tighter { letter-spacing: -0.05em; }
</style>
@endsection