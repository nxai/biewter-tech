<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PublicProductController extends Controller
{
    // ສະແດງສິນຄ້າທັງໝົດໃຫ້ລູກຄ້າເບິ່ງ
    // ໄຟລ໌ app/Http/Controllers/PublicProductController.php
public function index()
{
    // ດຶງຂໍ້ມູນສິນຄ້າທັງໝົດມາໄວ້ໃນ $products (ມີ s) 
    $products = Product::with('images')->latest()->get();

    // ຕ້ອງໃຊ້ compact('products') ໃຫ້ກົງກັບຊື່ຕົວປ່ຽນຂ້າງເທິງ
    return view('products.index', compact('products'));
}
    // ສະແດງລາຍລະອຽດສິນຄ້າ 1 ຢ່າງ (ພ້ອມຮູບທັງໝົດ)
    public function show($id)
    {
        $product = Product::with('images')->findOrFail($id);
        return view('products.show', compact('product'));
    }
}