<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-slate-800 leading-tight">ຈັດການອັດຕາແລກປ່ຽນ</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-2xl font-bold shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl rounded-3xl border-t-4" style="border-color: #f38d25;">
                <div class="p-8">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="p-4 rounded-2xl bg-blue-50 text-blue-600">
                            <i class="fa-solid fa-money-bill-transfer text-3xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-slate-800">ຕັ້ງຄ່າເລດເງິນ (THB to LAK)</h3>
                            <p class="text-sm text-slate-500">ກຳນົດອັດຕາແລກປ່ຽນເພື່ອຄຳນວນລາຄາສິນຄ້າໃນໜ້າເວັບ</p>
                        </div>
                    </div>

                    <form action="{{ route('admin.exchange-rate.update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        
                        <div class="mb-6">
                            <label class="block text-sm font-bold text-slate-700 mb-2">1 ບາດ (THB) ເທົ່າກັບ:</label>
                            <div class="relative">
                                <input type="number" name="rate" value="{{ $rate->rate }}" 
                                       class="w-full pl-4 pr-12 py-4 rounded-2xl border-slate-200 focus:border-blue-500 focus:ring-blue-500 text-2xl font-black text-blue-600 shadow-sm transition-all">
                                <span class="absolute right-4 top-1/2 -translate-y-1/2 font-bold text-slate-400">ກີບ</span>
                            </div>
                            @error('rate') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <button type="submit" class="w-full py-4 rounded-2xl text-white font-bold text-lg shadow-lg transition-all hover:-translate-y-1" style="background-color: #f38d25;">
                            <i class="fa-solid fa-save me-2"></i> ບັນທຶກການປ່ຽນແປງ
                        </button>
                    </form>

                    <div class="mt-8 p-4 bg-slate-50 rounded-2xl border border-dashed border-slate-300">
                        <p class="text-xs text-slate-500 leading-relaxed">
                            <i class="fa-solid fa-circle-info me-1 text-blue-500"></i> 
                            <strong>ໝາຍເຫດ:</strong> ເມື່ອທ່ານປ່ຽນຄ່ານີ້, ລາຄາເງິນບາດໃນໜ້າສິນຄ້າທັງໝົດຈະຖືກຄຳນວນໃໝ່ໂດຍອັດຕະໂນມັດ ໂດຍໃຊ້ສູດ: <code>ລາຄາກີບ / ເລດເງິນບາດ</code>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>