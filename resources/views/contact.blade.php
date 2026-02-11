@extends('layouts.main')

@section('title', 'ຕິດຕໍ່ພວກເຮົາ')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-lg overflow-hidden" style="border-radius: 20px;">
                <div class="row g-0">
                    <div class="col-md-4 bg-dark text-white p-4 p-lg-5">
                        <h4 class="fw-bold mb-4 text-primary">ຊ່ອງທາງຕິດຕໍ່</h4>
                        <div class="mb-4">
                            <p class="small mb-0 text-white-50"><i class="fa-solid fa-phone me-2"></i> ເບີໂທ:</p>
                            <p class="fw-bold">020 7787 2577</p>
                        </div>
                        <div class="mb-4 text-success">
                            <p class="small mb-0 text-white-50"><i class="fa-brands fa-whatsapp me-2"></i> WhatsApp:</p>
                            <p class="fw-bold">020 7787 2577</p>
                        </div>
                        <div class="mb-0">
                            <p class="small mb-0 text-white-50"><i class="fa-solid fa-location-dot me-2"></i> ທີ່ຕັ້ງ:</p>
                            <p class="small">ບ້ານນາສັງເວີຍ, ຫຼວງພະບາງ</p>
                        </div>
                    </div>

                    <div class="col-md-8 p-4 p-lg-5 bg-white">
                        <h3 class="fw-bold text-dark mb-4">ສົ່ງຂໍ້ຄວາມຫາພວກເຮົາ</h3>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">ຊື່ ແລະ ນາມສະກຸນ</label>
                                    <input type="text" name="name" value="{{ old('name') }}" 
                                        class="form-control bg-light border-0 py-2 @error('name') is-invalid @enderror" 
                                        placeholder="ປ້ອນຊື່ຂອງທ່ານ" required>
                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">ເບີໂທລະສັບ</label>
                                    <input type="text" name="phone" value="{{ old('phone') }}" 
                                        class="form-control bg-light border-0 py-2 @error('phone') is-invalid @enderror" 
                                        placeholder="020..." required>
                                    @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label small fw-bold">ບໍລິການທີ່ທ່ານສົນໃຈ</label>
                                    <select name="service_id" class="form-select bg-light border-0 py-2" required>
                                        <option value="" disabled {{ old('service_id') ? '' : 'selected' }}>-- ເລືອກບໍລິການ --</option>
                                        @foreach($services as $s)
                                            <option value="{{ $s->id }}" {{ old('service_id') == $s->id ? 'selected' : '' }}>
                                                {{ $s->name }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label class="form-label small fw-bold">ລາຍລະອຽດ ຫຼື ຄຳຖາມ</label>
                                    <textarea name="message" class="form-control bg-light border-0 py-2" rows="4" 
                                        placeholder="ບອກລາຍລະອຽດທີ່ທ່ານຕ້ອງການໃຫ້ພວກເຮົາຊ່ວຍ...">{{ old('message') }}</textarea>
                                </div>

                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-primary w-100 py-3 fw-bold rounded-pill shadow">
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
@endsection