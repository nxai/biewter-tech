@extends('layouts.main')

@section('title', 'ຕິດຕໍ່ພວກເຮົາ - Biewter Tech')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="card border-0 shadow-lg overflow-hidden rounded-5">
                <div class="row g-0">
                    <div class="col-md-4 p-5 text-white d-flex flex-column justify-content-between" style="background-color: #155a9a;">
                        <div>
                            <h4 class="fw-black mb-5 tracking-tighter" style="color: #f38d25;">ຊ່ອງທາງຕິດຕໍ່</h4>
                            
                            <div class="mb-4 d-flex align-items-center gap-3">
                                <div class="p-3 rounded-circle bg-white bg-opacity-10"><i class="fa-solid fa-phone"></i></div>
                                <div>
                                    <p class="small mb-0 opacity-50 uppercase fw-bold" style="font-size: 0.65rem;">ເບີໂທລະສັບ</p>
                                    <p class="fw-bold m-0">020 7787 2577</p>
                                </div>
                            </div>

                            <div class="mb-4 d-flex align-items-center gap-3">
                                <div class="p-3 rounded-circle bg-white bg-opacity-10 text-success"><i class="fa-brands fa-whatsapp fs-4"></i></div>
                                <div>
                                    <p class="small mb-0 opacity-50 uppercase fw-bold" style="font-size: 0.65rem;">WhatsApp</p>
                                    <p class="fw-bold m-0">020 7787 2577</p>
                                </div>
                            </div>

                            <div class="mb-4 d-flex align-items-center gap-3">
                                <div class="p-3 rounded-circle bg-white bg-opacity-10"><i class="fa-solid fa-location-dot"></i></div>
                                <div>
                                    <p class="small mb-0 opacity-50 uppercase fw-bold" style="font-size: 0.65rem;">ທີ່ຕັ້ງຂອງເຮົາ</p>
                                    <p class="small m-0">ບ້ານນາສັງເວີຍ, ຫຼວງພະບາງ</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-auto opacity-10 text-end">
                            <i class="fa-solid fa-microchip" style="font-size: 5rem;"></i>
                        </div>
                    </div>

                    <div class="col-md-8 p-4 p-lg-5 bg-white">
                        <h3 class="fw-black text-dark mb-2 tracking-tighter">ສົ່ງຂໍ້ຄວາມຫາພວກເຮົາ</h3>
                        <p class="text-muted small mb-4">ກະລຸນາປ້ອນຂໍ້ມູນເພື່ອໃຫ້ເຮົາຕິດຕໍ່ກັບ ຫຼື ຈອງຄິວວາງລະບົບ</p>

                        @if(session('success'))
                            <div class="alert alert-success border-0 rounded-4 shadow-sm mb-4 d-flex align-items-center">
                                <i class="fa-solid fa-circle-check me-3 fs-4"></i>
                                <div>{{ session('success') }}</div>
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf 
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label small fw-black text-dark">ຊື່ ແລະ ນາມສະກຸນ</label>
                                    <input type="text" name="name" value="{{ old('name') }}" 
                                        class="form-control bg-light border-0 py-3 px-4 rounded-4 @error('name') is-invalid @enderror" 
                                        placeholder="ປ້ອນຊື່ຂອງທ່ານ" required>
                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-black text-dark">ເບີໂທລະສັບ</label>
                                    <input type="text" name="phone" value="{{ old('phone') }}" 
                                        class="form-control bg-light border-0 py-3 px-4 rounded-4 @error('phone') is-invalid @enderror" 
                                        placeholder="020..." required>
                                    @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label small fw-black text-dark">ບໍລິການທີ່ທ່ານສົນໃຈ</label>
                                    <select name="service_id" class="form-select bg-light border-0 py-3 px-4 rounded-4" required>
                                        <option value="" disabled {{ old('service_id') ? '' : 'selected' }}>-- ເລືອກບໍລິການ --</option>
                                        @foreach($services as $s)
                                            <option value="{{ $s->id }}" {{ old('service_id') == $s->id ? 'selected' : '' }}>
                                                {{ $s->name }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label class="form-label small fw-black text-dark">ລາຍລະອຽດ ຫຼື ຄຳຖາມ</label>
                                    <textarea name="message" class="form-control bg-light border-0 py-3 px-4 rounded-4" rows="4" 
                                        placeholder="ບອກລາຍລະອຽດທີ່ທ່ານຕ້ອງການໃຫ້ພວກເຮົາຊ່ວຍ...">{{ old('message') }}</textarea>
                                </div>

                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn w-100 py-3 fw-black rounded-pill shadow-lg shadow-primary-hover text-white transition-all" style="background-color: #155a9a;">
                                        ສົ່ງຂໍ້ມູນຕິດຕໍ່ <i class="fa-solid fa-paper-plane ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .fw-black { font-weight: 900; }
    .rounded-5 { border-radius: 2.5rem !important; }
    .form-control:focus, .form-select:focus {
        background-color: #fff !important;
        box-shadow: 0 0 0 4px rgba(21, 90, 154, 0.1);
        border: 1px solid #155a9a !important;
    }
    .shadow-primary-hover:hover { 
        box-shadow: 0 10px 20px rgba(21, 90, 154, 0.3) !important;
        transform: translateY(-2px);
    }
</style>
@endsection