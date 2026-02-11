<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ລາຍການຈອງ ແລະ ການຕິດຕໍ່ - Biewter Tech') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="fw-bold mb-4">ລາຍການຕິດຕໍ່ຈາກລູກຄ້າ</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto border-collapse">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border px-4 py-2">ວັນທີ</th>
                                    <th class="border px-4 py-2">ຊື່ລູກຄ້າ</th>
                                    
                                    <th class="border px-4 py-2">ບໍລິການ</th>
                                    
                                    <th class="px-4 py-2">ສະຖານະ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                <tr class="hover:bg-gray-50 transition duration-150">
    <td class="px-6 py-4 text-sm text-gray-500">{{ $booking->created_at->format('d/m/Y H:i') }}</td>
    <td class="px-6 py-4">
        <div class="text-sm font-bold text-gray-900">{{ $booking->customer->full_name }}</div>
        <div class="text-xs text-gray-500">{{ $booking->customer->phone }}</div> </td>
    <td class="px-6 py-4">
        <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-lg text-xs font-bold border border-blue-100">
            {{ $booking->service->name }}
        </span>
    </td>
    <td class="px-6 py-4">
        <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST">
            @csrf @method('PATCH')
            <select name="status" onchange="this.form.submit()" 
                class="text-xs font-bold rounded-lg border-gray-200 focus:ring-blue-500 
                {{ $booking->status == 'pending' ? 'bg-orange-50 text-orange-600' : 'bg-green-50 text-green-600' }}">
                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>✅ Completed</option>
                <option value="canceled" {{ $booking->status == 'canceled' ? 'selected' : '' }}>❌ Canceled</option>
            </select>
        </form>
    </td>
</tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>