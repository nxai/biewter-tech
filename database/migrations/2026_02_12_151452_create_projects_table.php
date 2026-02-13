<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('projects', function (Blueprint $table) {
        $table->id();
        $table->string('title');       // ຊື່ໂຄງການ
        $table->string('category');    // ໝວດໝູ່ (CCTV, Network, IT)
        $table->text('description');   // ລາຍລະອຽດ
        $table->string('image_path');  // ຮູບພາບຜົນງານ
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
