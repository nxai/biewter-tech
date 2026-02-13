<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExchangeRate;
use Illuminate\Http\Request;

class ExchangeRateController extends Controller
{
    public function index()
    {
        // ດຶງຂໍ້ມູນເລດເງິນໂຕທຳອິດ (ຫຼື ສ້າງໃໝ່ຖ້າຍັງບໍ່ມີ)
        $rate = ExchangeRate::firstOrCreate(['id' => 1], ['rate' => 650]);
        return view('admin.exchange-rate', compact('rate'));
    }

    public function update(Request $request)
    {
        $request->validate(['rate' => 'required|numeric|min:1']);
        
        $rate = ExchangeRate::find(1);
        $rate->update(['rate' => $request->rate]);

        return back()->with('success', 'ອັບເດດເລດເງິນສຳເລັດແລ້ວ!');
    }
}