<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ພາບລວມລະບົບ - Biewter Tech') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-blue-500">
                    <p class="text-sm text-gray-500 uppercase font-bold">ລາຍການທັງໝົດ</p>
                    <p class="text-3xl font-bold">{{ $stats['total'] }}</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-yellow-500">
                    <p class="text-sm text-gray-500 uppercase font-bold">Pending</p>
                    <p class="text-3xl font-bold text-yellow-600">{{ $stats['pending'] }}</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-green-500">
                    <p class="text-sm text-gray-500 uppercase font-bold">Completed</p>
                    <p class="text-3xl font-bold text-green-600">{{ $stats['completed'] }}</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-purple-500">
                    <p class="text-sm text-gray-500 uppercase font-bold">ບໍລິການທັງໝົດ</p>
                    <p class="text-3xl font-bold">{{ $stats['services'] }}</p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6">
                <h3 class="text-lg font-bold mb-4">ຈັດການລະບົບ</h3>
                <div class="flex gap-4">
                    <a href="{{ route('admin.bookings') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                        ເບິ່ງລາຍການຕິດຕໍ່ທັງໝົດ
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>