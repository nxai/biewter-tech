<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        // ດຶງຂໍ້ມູນບໍລິການທັງໝົດ
        $services = Service::all();
        
        // ສົ່ງຂໍ້ມູນໄປທີ່ resources/views/index.blade.php
        return view('index', compact('services'));
    }
}