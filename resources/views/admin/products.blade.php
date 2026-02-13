<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-2xl text-slate-800 tracking-tighter">
                <i class="fa-solid fa-boxes-stacked me-2 text-[#155a9a]"></i>ຄັງສິນຄ້າ (Inventory)
            </h2>
            <button onclick="openAddModal()" 
                    class="px-6 py-3 rounded-2xl text-white font-bold shadow-lg shadow-orange-500/30 transition-all hover:-translate-y-1 active:scale-95"
                    style="background-color: #f38d25;">
                <i class="fa-solid fa-plus-circle me-2"></i>ເພີ່ມສິນຄ້າໃໝ່
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-2xl shadow-sm font-bold flex items-center">
                    <i class="fa-solid fa-circle-check me-3 text-xl"></i>
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl rounded-3xl border border-slate-100">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-100">
                                <th class="p-5 font-black text-slate-600 uppercase text-xs">ຮູບພາບ</th>
                                <th class="p-5 font-black text-slate-600 uppercase text-xs">ຂໍ້ມູນສິນຄ້າ</th>
                                <th class="p-5 font-black text-slate-600 uppercase text-xs text-center">ສະຕ໋ອກ</th>
                                <th class="p-5 font-black text-slate-600 uppercase text-xs">ລາຄາ (THB)</th>
                                <th class="p-5 font-black text-slate-600 uppercase text-xs text-center">ຈັດການ</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse($products as $product)
                            <tr class="hover:bg-slate-50/50 transition-all group">
                                <td class="p-5">
                                    <div class="flex -space-x-3 overflow-hidden">
                                        @foreach($product->images->take(3) as $img)
                                            <img class="inline-block h-14 w-14 rounded-2xl ring-4 ring-white object-cover shadow-sm" 
                                                 src="{{ asset('storage/' . $img->image_path) }}">
                                        @endforeach
                                        @if($product->images->count() > 3)
                                            <div class="flex items-center justify-center h-14 w-14 rounded-2xl bg-slate-200 text-[10px] font-black text-slate-500 ring-4 ring-white">
                                                +{{ $product->images->count() - 3 }}
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td class="p-5">
                                    <div class="font-black text-slate-800 text-lg group-hover:text-[#155a9a] transition-colors">{{ $product->name }}</div>
                                    <div class="text-xs text-slate-400 mt-1 truncate max-w-xs">{{ Str::limit($product->description, 50) }}</div>
                                </td>
                                <td class="p-5 text-center">
                                    @if($product->stock <= 5 && $product->stock > 0)
                                        <span class="px-3 py-1 rounded-full bg-orange-100 text-orange-600 text-xs font-black ring-1 ring-orange-200">
                                            ໃກ້ຈະໝົດ: {{ $product->stock }}
                                        </span>
                                    @elseif($product->stock == 0)
                                        <span class="px-3 py-1 rounded-full bg-red-100 text-red-600 text-xs font-black ring-1 ring-red-200">
                                            ໝົດສະຕ໋ອກ
                                        </span>
                                    @else
                                        <span class="px-3 py-1 rounded-full bg-blue-100 text-[#155a9a] text-xs font-black ring-1 ring-blue-200">
                                            ຄົງເຫຼືອ: {{ $product->stock }}
                                        </span>
                                    @endif
                                </td>
                                <td class="p-5">
                                    <div class="font-black text-[#155a9a] text-xl">{{ number_format($product->price, 2) }} ฿</div>
                                    <div class="text-[10px] text-slate-400 font-bold uppercase tracking-tighter">ຂໍ້ມູນຫຼັກເງິນບາດ</div>
                                </td>
                                <td class="p-5 text-center">
                                    <div class="flex justify-center gap-2">
                                        <button onclick="openEditModal({{ $product->load('images') }})" 
                                                class="p-3 rounded-xl bg-slate-100 text-slate-600 hover:bg-blue-50 hover:text-[#155a9a] transition-all">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('ຢືນຢັນການລຶບສິນຄ້ານີ້?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="p-3 rounded-xl bg-slate-100 text-slate-600 hover:bg-red-50 hover:text-red-500 transition-all">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="p-20 text-center">
                                    <div class="flex flex-col items-center opacity-20">
                                        <i class="fa-solid fa-box-open text-8xl mb-4"></i>
                                        <p class="font-black text-xl">ຍັງບໍ່ມີຂໍ້ມູນສິນຄ້າໃນລະບົບ</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="productModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" onclick="closeModal()">
                <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm"></div>
            </div>

            <div class="inline-block align-bottom bg-white rounded-[32px] text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-xl sm:w-full border-t-[12px]" style="border-color: #f38d25;">
                <form id="productForm" method="POST" enctype="multipart/form-data" class="p-8">
                    @csrf
                    <div id="methodField"></div>
                    
                    <div class="flex items-center gap-4 mb-8">
                        <div class="p-4 rounded-2xl text-white shadow-lg shadow-blue-500/20" style="background-color: #155a9a;">
                            <i class="fa-solid fa-file-circle-plus text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-black text-slate-800" id="modalTitle">ເພີ່ມສິນຄ້າໃໝ່</h3>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Biewter Tech Enterprise System</p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-black text-slate-700 mb-2">ຊື່ສິນຄ້າ</label>
                            <input type="text" name="name" id="p_name" class="w-full px-5 py-4 rounded-2xl border-slate-200 focus:ring-4 focus:ring-blue-500/10 focus:border-[#155a9a] transition-all font-bold" required>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-black text-slate-700 mb-2">ລາຄາ (ບາດ THB)</label>
                                <div class="relative">
                                    <span class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 font-bold">฿</span>
                                    <input type="number" name="price" id="p_price" step="0.01" class="w-full pl-10 pr-5 py-4 rounded-2xl border-slate-200 focus:ring-4 focus:ring-blue-500/10 focus:border-[#155a9a] transition-all font-black text-[#155a9a]" required>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-black text-slate-700 mb-2">ຈຳນວນສະຕ໋ອກ</label>
                                <input type="number" name="stock" id="p_stock" class="w-full px-5 py-4 rounded-2xl border-slate-200 focus:ring-4 focus:ring-orange-500/10 focus:border-[#f38d25] transition-all font-black" required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-black text-slate-700 mb-2">ລາຍລະອຽດ</label>
                            <textarea name="description" id="p_desc" rows="3" class="w-full px-5 py-4 rounded-2xl border-slate-200 focus:ring-4 focus:ring-blue-500/10 focus:border-[#155a9a] transition-all font-medium"></textarea>
                        </div>

                        <div id="editImagesSection" class="hidden">
                            <label class="block text-sm font-black text-slate-700 mb-3">ຮູບພາບປະຈຸບັນ (ຄລິກ ✕ ເພື່ອລຶບ)</label>
                            <div id="currentImages" class="flex flex-wrap gap-3 p-4 bg-slate-50 rounded-2xl border border-dashed border-slate-200"></div>
                        </div>

                        <div class="p-6 bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200 text-center">
                            <i class="fa-solid fa-images text-3xl text-slate-300 mb-2"></i>
                            <label class="block text-sm font-black text-slate-500 mb-2">ເລືອກຮູບພາບສິນຄ້າ (ຫຼາຍຮູບໄດ້)</label>
                            <input type="file" name="images[]" id="imageInput" multiple class="text-xs text-slate-400 file:mr-4 file:py-2 file:px-6 file:rounded-full file:border-0 file:text-xs file:font-black file:bg-[#155a9a] file:text-white hover:file:bg-[#0c3d69]">
                            <div id="newImagePreview" class="flex flex-wrap gap-2 mt-4 justify-center"></div>
                        </div>
                    </div>

                    <div class="mt-10 flex gap-4">
                        <button type="button" onclick="closeModal()" class="flex-1 py-4 rounded-2xl font-black text-slate-500 hover:bg-slate-100 transition-all uppercase tracking-widest text-xs">ຍົກເລີກ</button>
                        <button type="submit" class="flex-[2] py-4 rounded-2xl font-black text-white shadow-xl shadow-orange-500/30 transition-all hover:-translate-y-1 active:scale-95 uppercase tracking-widest text-xs" style="background-color: #f38d25;">
                            <i class="fa-solid fa-circle-check me-2"></i>ບັນທຶກຂໍ້ມູນ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('productModal');
        const form = document.getElementById('productForm');
        const methodField = document.getElementById('methodField');
        const modalTitle = document.getElementById('modalTitle');
        const imageInput = document.getElementById('imageInput');
        const newImagePreview = document.getElementById('newImagePreview');

        function openAddModal() {
            modalTitle.innerText = "ເພີ່ມສິນຄ້າໃໝ່";
            form.action = "{{ route('admin.products.store') }}";
            methodField.innerHTML = "";
            form.reset();
            newImagePreview.innerHTML = "";
            document.getElementById('editImagesSection').classList.add('hidden');
            modal.classList.remove('hidden');
        }

        function openEditModal(product) {
            modalTitle.innerText = "ແກ້ໄຂສິນຄ້າ";
            form.action = `/admin/products/${product.id}`;
            methodField.innerHTML = `@method('PATCH')`;
            
            document.getElementById('p_name').value = product.name;
            document.getElementById('p_price').value = product.price;
            document.getElementById('p_stock').value = product.stock;
            document.getElementById('p_desc').value = product.description;

            const gallery = document.getElementById('currentImages');
            gallery.innerHTML = "";
            if(product.images.length > 0) {
                document.getElementById('editImagesSection').classList.remove('hidden');
                product.images.forEach(img => {
                    gallery.innerHTML += `
                        <div class="relative group">
                            <img src="/storage/${img.image_path}" class="w-20 h-20 object-cover rounded-xl shadow-sm border-2 border-white ring-1 ring-slate-200">
                            <button type="button" onclick="deleteImage(${img.id})" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-lg hover:bg-red-700 transition-all scale-0 group-hover:scale-100">✕</button>
                        </div>
                    `;
                });
            } else {
                document.getElementById('editImagesSection').classList.add('hidden');
            }

            modal.classList.remove('hidden');
        }

        function closeModal() {
            modal.classList.add('hidden');
        }

        // Preview ຮູບພາບທີ່ເລືອກໃໝ່
        imageInput.addEventListener('change', function() {
            newImagePreview.innerHTML = "";
            [...this.files].forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    newImagePreview.innerHTML += `<img src="${e.target.result}" class="w-12 h-12 rounded-lg object-cover ring-2 ring-blue-500 shadow-sm">`;
                }
                reader.readAsDataURL(file);
            });
        });

        function deleteImage(id) {
            if(confirm('ຢືນຢັນການລຶບຮູບນີ້?')) {
                const dForm = document.createElement('form');
                dForm.method = 'POST';
                dForm.action = `/admin/product-images/${id}`;
                dForm.innerHTML = `@csrf @method('DELETE')`;
                document.body.appendChild(dForm);
                dForm.submit();
            }
        }
    </script>
</x-app-layout>