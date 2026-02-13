@extends('layouts.main')

@section('content')
<section class="py-5 text-white" style="background: linear-gradient(135deg, #155a9a 0%, #0c3d69 100%);">
    <div class="container text-center py-5">
        <h1 class="display-4 fw-black mb-3 tracking-tighter">ບໍລິການຂອງເຮົາ</h1>
        <p class="lead opacity-75">Biewter Tech ຍິນດີໃຫ້ຄຳປຶກສາ ແລະ ວາງລະບົບໄອທີແບບມືອາຊີບ</p>
    </div>
</section>

<div class="container py-5 mt-n5">
    <div class="row g-4 justify-content-center">
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 p-4 service-card transition-all">
                <div class="icon-box mb-4 d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 70px; height: 70px; background: rgba(21,90,154,0.05);">
                    <i class="fa-solid fa-video fs-1" style="color: #155a9a;"></i>
                </div>
                <h4 class="fw-bold mb-3">ຕິດຕັ້ງກ້ອງ CCTV</h4>
                <p class="text-muted small">ບໍລິການຕິດຕັ້ງກ້ອງວົງຈອນປິດຄວາມລະອຽດສູງ, ເບິ່ງອອນໄລນ໌ຜ່ານມືຖືໄດ້ທົ່ວໂລກ ພ້ອມຮັບປະກັນ ແລະ ບໍລິການຫຼັງການຂາຍ.</p>
                <ul class="list-unstyled mt-4 small">
                    <li><i class="fa-solid fa-check text-success me-2"></i> ວາງລະບົບສາຍ/ໄຮ້ສາຍ</li>
                    <li><i class="fa-solid fa-check text-success me-2"></i> ເຊັດລະບົບເບິ່ງຜ່ານມືຖື</li>
                    <li><i class="fa-solid fa-check text-success me-2"></i> ບໍລິການກວດເຊັດລາຍປີ</li>
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 p-4 service-card transition-all">
                <div class="icon-box mb-4 d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 70px; height: 70px; background: rgba(243,141,37,0.05);">
                    <i class="fa-solid fa-network-wired fs-1" style="color: #f38d25;"></i>
                </div>
                <h4 class="fw-bold mb-3">Network & Wi-Fi</h4>
                <p class="text-muted small">ວາງລະບົບເຄືອຂ່າຍພາຍໃນບ້ານ, ໂຮງແຮມ ແລະ ສຳນັກງານ ເຮັດໃຫ້ອິນເຕີເນັດແຮງ ແລະ ຄອບຄຸມທຸກຈຸດ.</p>
                <ul class="list-unstyled mt-4 small">
                    <li><i class="fa-solid fa-check text-success me-2"></i> ວາງລະບົບ LAN/Fiber</li>
                    <li><i class="fa-solid fa-check text-success me-2"></i> ຕິດຕັ້ງ Wi-Fi Access Point</li>
                    <li><i class="fa-solid fa-check text-success me-2"></i> ຈັດການ Bandwidth</li>
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 p-4 service-card transition-all">
                <div class="icon-box mb-4 d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 70px; height: 70px; background: rgba(21,90,154,0.05);">
                    <i class="fa-solid fa-microchip fs-1" style="color: #155a9a;"></i>
                </div>
                <h4 class="fw-bold mb-3">IT Solutions</h4>
                <p class="text-muted small">ຈຳໜ່າຍ, ຊ້ອມແປງ ແລະ ບຳລຸງຮັກສາອຸປະກອນຄອມພິວເຕີ, ປຣິນເຕີ ແລະ ອຸປະກອນໄອທີທຸກຊະນິດ.</p>
                <ul class="list-unstyled mt-4 small">
                    <li><i class="fa-solid fa-check text-success me-2"></i> ຊ້ອມແປງຄອມພິວເຕີ/ໂນດບຸກ</li>
                    <li><i class="fa-solid fa-check text-success me-2"></i> ຕິດຕັ້ງ Software ລິຂະສິດ</li>
                    <li><i class="fa-solid fa-check text-success me-2"></i> ຈັດຊື້ສະເປັກຕາມຄວາມຕ້ອງການ</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="mt-5 p-5 rounded-5 text-center text-white shadow-lg" style="background-color: #155a9a;">
        <h2 class="fw-black mb-4">ສົນໃຈໃຊ້ບໍລິການ ຫຼື ຕ້ອງການໃຫ້ອອກແບບລະບົບ?</h2>
        <a href="https://wa.me/2077872577" class="btn btn-lg px-5 rounded-pill fw-bold shadow-sm" style="background-color: #f38d25; color: white;">
            <i class="fa-brands fa-whatsapp me-2"></i> ຕິດຕໍ່ສອບຖາມຟຣີ
        </a>
    </div>
</div>

<style>
    .fw-black { font-weight: 900; }
    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(21, 90, 154, 0.1) !important;
    }
    .mt-n5 { margin-top: -3rem !important; }
</style>
@endsection