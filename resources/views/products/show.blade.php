@extends('layouts.main')

@section('content')
<div class="container py-5">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="text-decoration-none" style="color: #155a9a;">ໜ້າຫຼັກ</a></li>
            <li class="breadcrumb-item active">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="row g-5">
        <div class="col-lg-6">
            <div id="productCarousel" class="carousel slide shadow rounded-4 overflow-hidden border bg-white" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($product->images as $key => $img)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/'.$img->image_path) }}" class="d-block w-100" style="height: 500px; object-fit: contain;">
                        </div>
                    @endforeach
                </div>
                
                @if($product->images->count() > 1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark rounded-circle"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-dark rounded-circle"></span>
                    </button>
                @endif
            </div>
            
            <div class="row mt-3 g-2">
                @foreach($product->images as $key => $img)
                    <div class="col-3">
                        <img src="{{ asset('storage/'.$img->image_path) }}" 
                             class="img-fluid rounded-3 border cursor-pointer opacity-hover shadow-sm" 
                             data-bs-target="#productCarousel" 
                             data-bs-slide-to="{{ $key }}">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-lg-6 ps-lg-5">
            <div class="d-flex align-items-center gap-2 mb-2">
                <span class="text-muted small fw-bold uppercase tracking-widest">Biewter Tech Product</span>
                @if($product->stock > 0)
                    <span class="badge rounded-pill bg-success bg-opacity-10 text-success px-3 py-2 border border-success border-opacity-25">
                        <i class="fa-solid fa-circle-check me-1"></i> ມີສິນຄ້າພ້ອມສົ່ງ
                    </span>
                @else
                    <span class="badge rounded-pill bg-danger bg-opacity-10 text-danger px-3 py-2 border border-danger border-opacity-25">
                        <i class="fa-solid fa-circle-xmark me-1"></i> ສິນຄ້າໝົດຊົ່ວຄາວ
                    </span>
                @endif
            </div>

            <h1 class="fw-black mb-3 text-dark tracking-tighter" style="font-size: 2.5rem; color: #155a9a !important;">{{ $product->name }}</h1>
            
            <div class="p-4 rounded-4 mb-4 border-start border-4" style="background-color: #f8fafc; border-color: #f38d25 !important;">
                <div class="d-flex align-items-baseline gap-2">
                    <h2 class="fw-black m-0" style="color: #f38d25;">{{ number_format($product->price) }} ฿</h2>
                    <span class="h5 fw-bold text-muted m-0"> (≈ {{ number_format($product->price * $rate) }} ກີບ)</span>
                </div>
                <p class="small text-muted mb-0 mt-1 font-bold italic">* ອ້າງອີງຕາມເລດເງິນປະຈຸບັນ</p>
            </div>

            <div class="mb-5">
                <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-list-ul me-2" style="color: #155a9a;"></i> ຄຸນສົມບັດສິນຄ້າ:</h6>
                <div class="text-muted leading-relaxed p-3 bg-light rounded-3" style="white-space: pre-line; font-size: 0.95rem;">
                    {{ $product->description }}
                </div>
            </div>

            <a href="https://wa.me/2077872577?text=ສະບາຍດີ ບີ້ວເຕີເທັກ ສົນໃຈສິນຄ້າ: {{ $product->name }}" 
               class="btn btn-success btn-lg w-100 rounded-pill shadow-lg py-3 fw-black transition-all hover-grow">
                <i class="fa-brands fa-whatsapp me-2 fs-4"></i> ສອບຖາມ ຫຼື ສັ່ງຊື້ຜ່ານ WhatsApp
            </a>
            
            <div class="mt-4 row g-3 text-center">
                <div class="col-4">
                    <div class="small p-2 rounded-3 bg-light border"><i class="fa-solid fa-truck-fast text-primary"></i> ສົ່ງໄວ</div>
                </div>
                <div class="col-4">
                    <div class="small p-2 rounded-3 bg-light border"><i class="fa-solid fa-shield-halved text-primary"></i> ປະກັນແທ້</div>
                </div>
                <div class="col-4">
                    <div class="small p-2 rounded-3 bg-light border"><i class="fa-solid fa-wrench text-primary"></i> ຕິດຕັ້ງຟຣີ</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container py-5 border-top">
    <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
            <h3 class="fw-black text-dark tracking-tighter m-0">ສິນຄ້າທີ່ກ່ຽວຂ້ອງ</h3>
            <div class="h-1 mt-2" style="width: 50px; background-color: #f38d25;"></div>
        </div>
        <a href="{{ route('products.index') }}" class="text-decoration-none fw-bold" style="color: #155a9a;">
            ເບິ່ງທັງໝົດ <i class="fa-solid fa-arrow-right-long ms-1"></i>
        </a>
    </div>

    <div class="row g-4">
        @foreach($relatedProducts as $related)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden related-card transition-all">
                <div class="position-relative">
                    @if($related->images->count() > 0)
                        <img src="{{ asset('storage/'.$related->images->first()->image_path) }}" 
                             class="card-img-top" style="height: 180px; object-fit: cover;" alt="{{ $related->name }}">
                    @endif
                    
                    @if($related->stock <= 0)
                        <div class="position-absolute top-0 end-0 m-2">
                            <span class="badge rounded-pill bg-danger shadow-sm" style="font-size: 0.6rem;">ໝົດ</span>
                        </div>
                    @endif
                </div>
                
                <div class="card-body p-3">
                    <h6 class="fw-bold text-dark text-truncate mb-2" style="font-size: 0.9rem;">{{ $related->name }}</h6>
                    
                    <div class="mb-3">
                        <div class="fw-black m-0" style="color: #f38d25;">{{ number_format($related->price) }} ฿</div>
                        <div class="text-muted" style="font-size: 0.75rem;">≈ {{ number_format($related->price * $rate) }} ກີບ</div>
                    </div>

                    <a href="{{ route('products.show', $related->id) }}" 
                       class="btn btn-sm w-100 rounded-pill fw-bold btn-outline-brand">
                        ລາຍລະອຽດ
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .related-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 25px rgba(21, 90, 154, 0.1) !important;
    }
    .btn-outline-brand {
        border: 2px solid #155a9a;
        color: #155a9a;
        font-size: 0.8rem;
    }
    .btn-outline-brand:hover {
        background-color: #155a9a;
        color: white;
    }
    .fw-black { font-weight: 900; }
    .opacity-hover:hover { opacity: 0.7; border-color: #f38d25 !important; }
    .hover-grow:hover { transform: scale(1.02); filter: brightness(1.1); }
    .leading-relaxed { line-height: 1.8; }
</style>
@endsection