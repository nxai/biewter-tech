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
    Schema::table('products', function (Blueprint $table) {
        // 1. ເເພີ່ມ Column stock ເກັບຈຳນວນສິນຄ້າ (ໃຫ້ຢູ່ຕໍ່ຫຼັງ price)
        $table->integer('stock')->default(0)->after('price');

        // 2. ປັບປຸງ Column price ໃຫ້ຮອງຮັບທົດສະນິຍົມ (ສຳລັບເງິນບາດທີ່ລະອຽດ)
        // ໝາຍເຫດ: ຕ້ອງລົງ package doctrine/dbal ກ່ອນຖ້າຈະໃຊ້ ->change()
        $table->decimal('price', 15, 2)->change();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
