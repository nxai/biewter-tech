<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    \App\Models\Service::create([
        'name' => 'ຕິດຕັ້ງກ້ອງວົງຈອນປິດ',
        'description' => 'ບໍລິການຕິດຕັ້ງກ້ອງ CCTV ທັງແບບ IP ແລະ Analog',
        'price_range' => 'ເລີ່ມຕົ້ນ 1,xxx',
        'icon' => 'fa-video'
    ]);

    \App\Models\Service::create([
        'name' => 'ວາງລະບົບ Network/Wi-Fi',
        'description' => 'ອອກແບບ ແລະ ຕິດຕັ້ງລະບົບອິນເຕີເນັດພາຍໃນ',
        'price_range' => 'ປະເມີນຕາມໜ້າວຽກ',
        'icon' => 'fa-network-wired'
    ]);
}
}
