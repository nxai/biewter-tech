@extends('layouts.main')

@section('content')
<section class="py-5 text-white" style="background: linear-gradient(135deg, #155a9a 0%, #0c3d69 100%);">
    <div class="container text-center py-5">
        <h1 class="display-4 fw-black mb-3 tracking-tighter">ຜົນງານທີ່ຜ່ານມາ</h1>
        <p class="lead opacity-75">ລວມຜົນງານການຕິດຕັ້ງ ແລະ ວາງລະບົບໂດຍ Biewter Tech</p>
    </div>
</section>

<div class="container py-5">
    <div class="row g-4">
        @forelse($projects as $project)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden portfolio-card transition-all">
                <div class="position-relative">
                    <img src="{{ asset('storage/' . $project->image_path) }}" 
                         class="card-img-top" style="height: 260px; object-fit: cover;" 
                         alt="{{ $project->title }}">
                    
                    <div class="portfolio-category badge position-absolute top-0 start-0 m-3 py-2 px-3 rounded-pill shadow-sm" 
                         style="background-color: #f38d25; font-size: 0.7rem;">
                        {{ $project->category }}
                    </div>
                </div>
                <div class="card-body p-4 text-center">
                    <h5 class="fw-bold mb-2 text-dark">{{ $project->title }}</h5>
                    <p class="text-muted small mb-0">{{ Str::limit($project->description, 100) }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5 opacity-50">
            <i class="fa-solid fa-folder-open display-1 mb-3"></i>
            <p>ຍັງບໍ່ມີຂໍ້ມູນຜົນງານໃນປະຈຸບັນ</p>
        </div>
        @endforelse
    </div>
</div>

<style>
    .fw-black { font-weight: 900; }
    .portfolio-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(21, 90, 154, 0.1) !important;
    }
</style>
@endsection