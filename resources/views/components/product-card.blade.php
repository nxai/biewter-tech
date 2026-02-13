<div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden transition-all hover-card">
    <div class="position-relative overflow-hidden" style="height: 220px;">
        @if($product->images->count() > 0)
            <img src="{{ asset('storage/'.$product->images->first()->image_path) }}" 
                 class="w-100 h-100 object-fit-cover transition-transform img-zoom" 
                 alt="{{ $product->name }}">
        @else
            <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center text-muted">
                <i class="fa-solid fa-image display-4 opacity-25"></i>
            </div>
        @endif
        
        <div class="position-absolute top-0 end-0 m-3">
            @if($product->stock > 0)
                <span class="badge rounded-pill bg-success px-3 shadow-sm border border-white border-opacity-25" style="font-size: 0.65rem; background-color: #198754 !important;">ມີສິນຄ້າ</span>
            @else
                <span class="badge rounded-pill bg-danger px-3 shadow-sm border border-white border-opacity-25" style="font-size: 0.65rem; background-color: #dc3545 !important;">ໝົດຊົ່ວຄາວ</span>
            @endif
        </div>
    </div>

    <div class="card-body p-4 d-flex flex-column">
        <h6 class="fw-bold text-dark text-truncate mb-3" style="font-size: 0.95rem;">{{ $product->name }}</h6>
        
        <div class="mb-4 mt-auto">
            <div class="d-flex align-items-baseline gap-1">
                <span class="h5 fw-black m-0" style="color: #f38d25;">{{ number_format($product->price) }}</span>
                <span class="small fw-bold" style="color: #f38d25;">฿</span>
            </div>
            <div class="small fw-bold opacity-50" style="color: #155a9a;">
                ≈ {{ number_format($product->price * $rate) }} ກີບ
            </div>
        </div>

        <a href="{{ route('products.show', $product->id) }}" 
           class="btn btn-brand-outline w-100 rounded-pill fw-black py-2 shadow-sm">
            ລາຍລະອຽດສິນຄ້າ
        </a>
    </div>
</div>

<style>
    .fw-black { font-weight: 900; }
    .hover-card { transition: 0.4s cubic-bezier(0.165, 0.84, 0.44, 1); }
    .hover-card:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(21, 90, 154, 0.12) !important; }
    
    .btn-brand-outline { 
        border: 2px solid #155a9a; 
        color: #155a9a; 
        font-size: 0.8rem;
        transition: 0.3s;
    }
    .btn-brand-outline:hover { 
        background-color: #155a9a; 
        color: white; 
    }
    
    .img-zoom { transition: transform 0.8s ease; }
    .hover-card:hover .img-zoom { transform: scale(1.1); }
</style>