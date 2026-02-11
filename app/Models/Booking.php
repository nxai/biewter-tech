<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// ຢ່າລືມເພີ່ມການນຳໃຊ້ Model ອື່ນໆ
use App\Models\Customer;
use App\Models\Service;

class Booking extends Model
{
    protected $fillable = ['customer_id', 'service_id', 'message', 'status'];

    /**
     * ກຳນົດຄວາມສຳພັນ: ການຈອງນີ້ ເປັນຂອງລູກຄ້າຄົນໃດ
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * ກຳນົດຄວາມສຳພັນ: ການຈອງນີ້ ແມ່ນບໍລິການຫຍັງ
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}