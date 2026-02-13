<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
{
    // ເພີ່ມບັນທັດນີ້ເພື່ອອະນຸຍາດໃຫ້ບັນທຶກຂໍ້ມູນ id ແລະ rate ໄດ້
    protected $fillable = ['id', 'rate'];
}