@extends('layouts.main')

@section('content')
<section class="py-5 text-white" style="background: linear-gradient(135deg, #155a9a 0%, #0c3d69 100%);">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h1 class="display-4 fw-black mb-3 tracking-tighter">Biewter Tech</h1>
                <p class="lead opacity-75 mb-0">ບໍລິການດ້ານໄອທີ ແລະ ລະບົບຄວາມປອດໄພ ຄົບວົງຈອນ ໃນນະຄອນຫຼວງພະບາງ</p>
            </div>
            <div class="col-lg-5 text-lg-end d-none d-lg-block">
                <i class="fa-solid fa-microchip display-1 opacity-25"></i>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="{{ asset('images/about-image.jpg') }}" class="img-fluid rounded-[40px] shadow-2xl" alt="Biewter Tech Team">
                    <div class="position-absolute bottom-0 start-0 m-4 p-4 bg-white rounded-4 shadow-lg d-none d-md-block">
                        <h2 class="fw-black m-0 text-primary">20+</h2>
                        <p class="small text-muted m-0">ປີແຫ່ງປະສົບການ</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="fw-black mb-4 text-dark tracking-tighter">ຄວາມຊ່ຽວຊານທີ່ທ່ານ <span style="color: #f38d25;">ໄວ້ວາງໃຈໄດ້</span></h2>
                <p class="text-muted leading-relaxed mb-4">
                    **Biewter Tech** ເລີ່ມຕົ້ນຈາກຄວາມຫຼົງໄຫຼໃນເຕັກໂນໂລຊີ ແລະ ປະສົບການດ້ານ Graphic Design ແລະ IT ມາຫຼາຍກວ່າ 20 ປີ. ເຮົາຕັ້ງໝັ້ນທີ່ຈະນຳເອົາວິຊາຊີບ ແລະ ມາດຕະຖານລະດັບສາກົນມາຮັບໃຊ້ສັງຄົມໃນຫຼວງພະບາງ.
                </p>
                <p class="text-muted leading-relaxed">
                    ເຮົາບໍ່ໄດ້ພຽງແຕ່ຕິດຕັ້ງກ້ອງວົງຈອນປິດ ຫຼື ວາງລະບົບເຄືອຂ່າຍເທົ່ານັ້ນ, ແຕ່ເຮົາ "ອອກແບບ" ທາງເລືອກທີ່ດີທີ່ສຸດໃຫ້ກັບລູກຄ້າ ເພື່ອໃຫ້ທຸກລະບົບເຮັດວຽກໄດ້ຢ່າງມີປະສິດທິພາບ, ສວຍງາມ ແລະ ປອດໄພທີ່ສຸດ.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background-color: #f8fafc;">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-black tracking-tighter text-dark">ເປັນຫຍັງຕ້ອງເລືອກ Biewter Tech?</h2>
            <div class="mx-auto mt-3" style="width: 60px; height: 5px; background-color: #f38d25; border-radius: 10px;"></div>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-5 bg-white rounded-4 h-100 shadow-sm border-0 text-center transition-hover">
                    <i class="fa-solid fa-award display-4 mb-4" style="color: #155a9a;"></i>
                    <h5 class="fw-bold">ຄຸນນະພາບມາດຕະຖານ</h5>
                    <p class="small text-muted m-0">ເຮົາເລືອກໃຊ້ອຸປະກອນທີ່ມີຄຸນນະພາບສູງ ແລະ ຜ່ານການທົດສອບມາດຕະຖານເທົ່ານັ້ນ.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-5 bg-white rounded-4 h-100 shadow-sm border-0 text-center transition-hover">
                    <i class="fa-solid fa-screwdriver-wrench display-4 mb-4" style="color: #f38d25;"></i>
                    <h5 class="fw-bold">ບໍລິການຫຼັງການຂາຍ</h5>
                    <p class="small text-muted m-0">ເຮົາບໍ່ຖິ້ມລູກຄ້າ. ທີມງານພ້ອມຊ່ວຍເຫຼືອ ແລະ ແກ້ໄຂບັນຫາໃຫ້ທ່ານຕະຫຼອດເວລາ.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-5 bg-white rounded-4 h-100 shadow-sm border-0 text-center transition-hover">
                    <i class="fa-solid fa-lightbulb display-4 mb-4" style="color: #155a9a;"></i>
                    <h5 class="fw-bold">ຄຳປຶກສາມືອາຊີບ</h5>
                    <p class="small text-muted m-0">ດ້ວຍປະສົບການ Graphic Design 20 ປີ, ເຮົາວາງລະບົບໃຫ້ສວຍງາມ ແລະ ເປັນລະບຽບ.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="p-5 rounded-[40px] text-white overflow-hidden position-relative shadow-lg" style="background-color: #155a9a;">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="fw-black mb-4">ຕັ້ງຢູ່ໃນນະຄອນຫຼວງພະບາງ</h2>
                    <p class="opacity-75 mb-4">
                        <i class="fa-solid fa-location-dot me-2 text-warning"></i> ບ້ານນາສ້າງເຫວີຍ, ນະຄອນຫຼວງພະບາງ, ແຂວງຫຼວງພະບາງ.
                    </p>
                    <a href="https://wa.me/2077872577" class="btn btn-lg px-5 rounded-pill fw-bold shadow-sm" style="background-color: #f38d25; color: white;">
                        <i class="fa-brands fa-whatsapp me-2"></i> ສອບຖາມຂໍ້ມູນເພີ່ມເຕີມ
                    </a>
                </div>
                <div class="col-lg-6 text-center mt-4 mt-lg-0">
                    <i class="fa-solid fa-map-location-dot display-1 opacity-25"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .fw-black { font-weight: 900; }
    .transition-hover { transition: all 0.3s ease; }
    .transition-hover:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(0,0,0,0.05) !important; }
</style>
@endsection