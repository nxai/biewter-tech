<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-2xl text-slate-800"><i class="fa-solid fa-images me-2 text-[#155a9a]"></i>ຈັດການຜົນງານ</h2>
            <button onclick="openAddModal()" class="px-6 py-3 rounded-2xl text-white font-bold shadow-lg" style="background-color: #f38d25;">
                <i class="fa-solid fa-plus me-2"></i>ເພີ່ມຜົນງານ
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-[32px] overflow-hidden border border-slate-100">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 border-b border-slate-100">
                        <tr>
                            <th class="p-5 font-black text-xs uppercase text-slate-500">ຮູບພາບ</th>
                            <th class="p-5 font-black text-xs uppercase text-slate-500">ຫົວຂໍ້ໂຄງການ</th>
                            <th class="p-5 font-black text-xs uppercase text-slate-500">ໝວດໝູ່</th>
                            <th class="p-5 font-black text-xs uppercase text-slate-500 text-center">ຈັດການ</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach($projects as $project)
                        <tr class="hover:bg-slate-50/50 transition-all">
                            <td class="p-5">
                                <img src="{{ asset('storage/'.$project->image_path) }}" class="h-16 w-24 object-cover rounded-xl shadow-sm border-2 border-white ring-1 ring-slate-100">
                            </td>
                            <td class="p-5 font-bold text-slate-800">{{ $project->title }}</td>
                            <td class="p-5">
                                <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest" style="background: rgba(21,90,154,0.1); color: #155a9a;">
                                    {{ $project->category }}
                                </span>
                            </td>
                            <td class="p-5 text-center">
                                <div class="flex justify-center gap-2">
                                    <button onclick="openEditModal({{ $project }})" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-all"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <form action="{{ route('admin.portfolio.destroy', $project->id) }}" method="POST" onsubmit="return confirm('ຢືນຢັນການລຶບ?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-all"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="projectModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" onclick="closeModal()"></div>
            <div class="bg-white rounded-[32px] overflow-hidden shadow-2xl transform transition-all sm:max-w-lg sm:w-full border-t-[10px]" style="border-color: #f38d25;">
                <form id="projectForm" method="POST" enctype="multipart/form-data" class="p-8">
                    @csrf <div id="methodField"></div>
                    <h3 class="text-2xl font-black mb-6 text-slate-800" id="modalTitle">ເພີ່ມຜົນງານ</h3>
                    
                    <div class="space-y-4">
                        <input type="text" name="title" id="p_title" placeholder="ຊື່ໂຄງການ" class="w-full px-5 py-4 rounded-2xl border-slate-200 focus:ring-[#155a9a]" required>
                        <select name="category" id="p_category" class="w-full px-5 py-4 rounded-2xl border-slate-200 focus:ring-[#155a9a]" required>
                            <option value="CCTV">CCTV Installation</option>
                            <option value="Network">Network Solution</option>
                            <option value="IT Support">IT Support & Services</option>
                        </select>
                        <textarea name="description" id="p_desc" placeholder="ລາຍລະອຽດ..." class="w-full px-5 py-4 rounded-2xl border-slate-200 focus:ring-[#155a9a]"></textarea>
                        
                        <div class="p-6 bg-slate-50 rounded-2xl border-2 border-dashed border-slate-200 text-center">
                            <input type="file" name="image" id="imgInput" class="hidden" accept="image/*">
                            <label for="imgInput" class="cursor-pointer">
                                <i class="fa-solid fa-cloud-arrow-up text-3xl text-slate-300 mb-2"></i>
                                <p class="text-xs font-bold text-slate-500">ເລືອກຮູບພາບຜົນງານ</p>
                            </label>
                            <img id="preview" class="mt-4 mx-auto h-32 rounded-lg hidden">
                        </div>
                    </div>

                    <div class="mt-8 flex gap-3">
                        <button type="button" onclick="closeModal()" class="flex-1 font-bold text-slate-400">ຍົກເລີກ</button>
                        <button type="submit" class="flex-[2] py-4 rounded-2xl text-white font-black shadow-lg shadow-orange-500/30" style="background-color: #f38d25;">ບັນທຶກຂໍ້ມູນ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openAddModal() {
            document.getElementById('modalTitle').innerText = "ເພີ່ມຜົນງານໃໝ່";
            document.getElementById('projectForm').action = "{{ route('admin.portfolio.store') }}";
            document.getElementById('methodField').innerHTML = "";
            document.getElementById('projectForm').reset();
            document.getElementById('preview').classList.add('hidden');
            document.getElementById('projectModal').classList.remove('hidden');
        }

        function openEditModal(project) {
            document.getElementById('modalTitle').innerText = "ແກ້ໄຂຜົນງານ";
            document.getElementById('projectForm').action = `/admin/portfolio/${project.id}`;
            document.getElementById('methodField').innerHTML = `@method('PATCH')`;
            document.getElementById('p_title').value = project.title;
            document.getElementById('p_category').value = project.category;
            document.getElementById('p_desc').value = project.description;
            document.getElementById('preview').src = `/storage/${project.image_path}`;
            document.getElementById('preview').classList.remove('hidden');
            document.getElementById('projectModal').classList.remove('hidden');
        }

        function closeModal() { document.getElementById('projectModal').classList.add('hidden'); }

        document.getElementById('imgInput').onchange = evt => {
            const [file] = evt.target.files;
            if (file) {
                document.getElementById('preview').src = URL.createObjectURL(file);
                document.getElementById('preview').classList.remove('hidden');
            }
        }
    </script>
</x-app-layout>