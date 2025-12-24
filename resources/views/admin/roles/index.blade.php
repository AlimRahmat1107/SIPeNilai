@extends('admin.layouts.main')

@section('container')
    <div class="w-11/12 mt-6 ml-10">
        <div class="mb-2 flex justify-between">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> Table Role
            </p>
            <button id="openModal" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah
                Data</button>



        </div>

        <div class="bg-white overflow-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Role</th>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">

                    @foreach ($roles as $role)
                        <tr>
                            <td class="w-1/3 text-left py-3 px-4">{{ $loop->iteration }}</td>
                            <td class="w-1/3 text-left py-3 px-4">{{ $role->name }}</td>
                            <td class="w-1/3 text-left py-3 px-4 flex">
                                <button
                                    class="editRole w-10 h-10 bg-blue-500 hover:bg-blue-700 transition duration-300 shadow-md flex justify-center items-center  text-white font-bold py-2 px-4 rounded-full"
                                    data-id="{{ $role->id }}" data-name="{{ $role->name }}"><i
                                        class="fas fa-edit "></i> </button>
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus role ini?');">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="ml-2 w-10 h-10 flex items-center justify-center bg-red-600 text-white rounded-full hover:bg-red-700 transition duration-300 shadow-md"
                                        type="submit" onclick="return confirm('Yakin hapus?')"> <i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div <!-- Modal Create -->
        <div id="modal" class="fixed inset-0 bg-opacity-50 backdrop-blur-sm flex items-center justify-center hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h2 class="text-xl font-semibold mb-4">Tambah Role</h2>

                <!-- Form -->
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    <input type="hidden" id="id">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">name:</label>
                        <input type="text" id="name" name="name" class="w-full border rounded-md p-2 "
                            value="" required>
                    </div>



                    <div class="flex justify-end space-x-2">
                        <button type="button" id="closeModal"
                            class="px-4 py-2 bg-gray-500 text-white rounded-md">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md">Simpan</button>
                    </div>
                </form>
            </div>
        </div>


        <div id="modalEdit" class="fixed inset-0 bg-opacity-50 backdrop-blur-sm flex items-center justify-center hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h2 class="text-xl font-semibold mb-4">Edit Role</h2>

                <!-- Form -->
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_id" name="id">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">name:</label>
                        <input type="text" id="edit_name" name="name" value="{{ $role->name ?? '' }}"
                            class="w-full border rounded-md p-2" required>
                    </div>



                    <div class="flex justify-end space-x-2">
                        <button type="button" id="closeModalEdit"
                            class="px-4 py-2 bg-gray-500 text-white rounded-md">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md">Simpan</button>
                    </div>
                </form>
            </div>
        </div>


    </div>

    <script>
        //Modal
        document.addEventListener("DOMContentLoaded", function() {
            const modal = document.getElementById("modal");
            const openModalBtn = document.getElementById("openModal");
            const closeModalBtn = document.getElementById("closeModal");

            // Buka modal saat tombol diklik
            openModalBtn.addEventListener("click", function() {
                modal.classList.remove("hidden");
            });

            closeModalBtn.addEventListener("click", function() {
                modal.classList.add("hidden");
            });

            window.addEventListener("click", function(event) {
                if (event.target === modal) {
                    modal.classList.add("hidden");
                }
            });

            document.addEventListener("keydown", function(event) {
                if (event.key === "Escape") {
                    modal.classList.add("hidden");
                }
            });
        });



        //modal update
        document.addEventListener("DOMContentLoaded", function() {
            const modalEdit = document.getElementById("modalEdit");
            const editForm = document.getElementById("editForm");
            const closeModalBtnEdit = document.getElementById("closeModalEdit");

            document.querySelectorAll(".editRole").forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const name = this.dataset.name;

                    document.getElementById("edit_id").value = id;
                    document.getElementById("edit_name").value = name;

                    editForm.action = "/admin/role/update/" + id
                    modalEdit.classList.remove("hidden");
                })
            })



            // Tutup modal saat tombol "Batal" diklik
            closeModalBtnEdit.addEventListener("click", function() {
                modalEdit.classList.add("hidden");
            });

            // Tutup modal saat klik di luar area modal
            window.addEventListener("click", function(event) {
                if (event.target === modalEdit) {
                    modalEdit.classList.add("hidden");
                }
            });

            // Tutup modal dengan tombol Escape
            document.addEventListener("keydown", function(event) {
                if (event.key === "Escape") {
                    modal.classList.add("hidden");
                }
            });
        });
    </script>
@endsection
