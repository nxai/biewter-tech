<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // ກຳນົດ Column ທີ່ອະນຸຍາດໃຫ້ເພີ່ມຂໍ້ມູນໄດ້
    protected $fillable = ['name', 'description', 'price_range', 'icon'];
}