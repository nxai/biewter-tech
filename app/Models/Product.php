<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    'name', 
    'description', 
    'price', // ຕອນນີ້ເປັນ THB ແລ້ວ
    'stock'  // ເພີ່ມເຂົ້າມາໃໝ່
    ];
   public function images() {
    return $this->hasMany(ProductImage::class);
}
}
