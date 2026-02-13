<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Product; // <--- ເພີ່ມບັນທັດນີ້
use App\Models\ExchangeRate; // <--- ເພີ່ມບັນທັດນີ້
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        // 1. ດຶງຂໍ້ມູນສິນຄ້າມາໃໝ່ 8 ລາຍການ (ສຳລັບສະແດງໃນໜ້າຫຼັກ)
        $products = Product::with('images')->latest()->take(8)->get();

        // 2. ດຶງເລດເງິນບາດມາໃຊ້ຄຳນວນ (ຖ້າບໍ່ມີໃຫ້ໃຊ້ຄ່າເລີ່ມຕົ້ນ 700)
        $rateData = ExchangeRate::first();
        $rate = $rateData ? $rateData->rate : 700;

        // 3. ດຶງຂໍ້ມູນບໍລິການ (ຖ້າມີ)
        $services = Service::all();

        // 4. ສົ່ງຕົວປ່ຽນທັງໝົດໄປຫາ View index.blade.php
        return view('index', compact('products', 'rate', 'services'));
    }
}