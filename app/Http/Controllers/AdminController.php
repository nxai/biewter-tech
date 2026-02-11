<?php

namespace App\Http\Controllers; // <--- ຕ້ອງມີບັນທັດນີ້ ແລະ ຕ້ອງພິມໃຫ້ຖືກ

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['customer', 'service'])->latest()->get();
        return view('admin.bookings', compact('bookings'));
    }
    public function updateStatus(\App\Models\Booking $booking, \Illuminate\Http\Request $request)
{
    $booking->update([
        'status' => $request->status
    ]);

    return back()->with('success', 'ອັບເດດສະຖານະການຈອງຮຽບຮ້ອຍແລ້ວ!');
}
public function dashboard()
{
    // ນັບຈຳນວນລາຍການແຍກຕາມສະຖານະ
    $stats = [
        'total'     => Booking::count(),
        'pending'   => Booking::where('status', 'pending')->count(),
        'completed' => Booking::where('status', 'completed')->count(),
        'services'  => Service::count(),
    ];

    return view('dashboard', compact('stats'));
}
}