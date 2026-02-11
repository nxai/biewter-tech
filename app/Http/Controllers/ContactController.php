<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Booking;
// ເພີ່ມ Model Service ເຂົ້າມາ
use App\Models\Service; 

class ContactController extends Controller
{
    // ເພີ່ມ Function ນີ້ເພື່ອສະແດງໜ້າຟອມ
    public function index()
    {
        $services = Service::all(); // ດຶງຂໍ້ມູນບໍລິການໄປໂຊໃນ Dropdown
        return view('contact', compact('services'));
    }

    public function store(Request $request)
{
    // 1. ກວດສອບຂໍ້ມູນ
    $request->validate([
        'name' => 'required|min:3',
        'phone' => 'required|numeric',
        'service_id' => 'required|exists:services,id',
    ]);

    // 2. ບັນທຶກຂໍ້ມູນລົງຖານຂໍ້ມູນ (ເພີ່ມສ່ວນນີ້ເຂົ້າໄປ)
    DB::transaction(function () use ($request) {
        // ບັນທຶກລົງຕາຕະລາງ customers
        $customer = Customer::create([
            'full_name' => $request->name,
            'phone' => $request->phone
        ]);

        // ບັນທຶກລົງຕາຕະລາງ bookings
        Booking::create([
            'customer_id' => $customer->id,
            'service_id' => $request->service_id,
            'message' => $request->message,
            'status' => 'pending' // ກຳນົດສະຖານະເລີ່ມຕົ້ນ
        ]);
    });

    // 3. ສົ່ງກັບໄປໜ້າເກົ່າພ້ອມຂໍ້ຄວາມສຳເລັດ (ສ່ວນນີ້ສຳຄັນທີ່ສຸດເພື່ອແກ້ໜ້າຂາວ)
    return redirect()->back()->with('success', 'ພວກເຮົາໄດ້ຮັບຂໍ້ມູນແລ້ວ! ຈະມີທີມງານຕິດຕໍ່ກັບໂດຍໄວ.');
}
}