<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        // ດຶງຂໍ້ມູນຜົນງານທັງໝົດ ໂດຍເອົາອັນໃໝ່ລົງກ່ອນ
        $projects = Project::latest()->get();
        return view('portfolio', compact('projects'));
    }
}