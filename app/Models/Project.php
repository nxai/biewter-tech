<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // ເພີ່ມບັນທັດນີ້ເພື່ອອະນຸຍາດໃຫ້ບັນທຶກຂໍ້ມູນແບບ Mass Assignment ໄດ້
    protected $fillable = [
        'title', 
        'category', 
        'description', 
        'image_path'
    ];
}