@extends('layouts.main')

@section('container')

<div class="w-11/12 mt-6 ml-10">
    <div class="mb-2 flex justify-between">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Table Kota
        </p>
        <form action="{{ route('city.import') }}" method="POST" enctype="multipart/form-data" class="flex w-[400px] justify-between">
            @csrf
            <div class="mt-2">
            <input type="file" id="fileInput" name="file" class="hidden">
            <label for="fileInput" class="px-4 py-2 mx-1 bg-blue-500 text-white rounded cursor-pointer hover:bg-blue-700">
                Pilih File
            </label>
            <span id="fileName" class=" text-gray-700 bg-gray-200 rounded">Tidak ada file</span>
            </div>
            {{-- <input class="px-5 py-1 text-gray-700 bg-gray-200 rounded" type="file" name="file" accept=".csv"> --}}
            <button type="submit" class="px-4 py-2 mx-1 bg-blue-500 text-white rounded cursor-pointer hover:bg-blue-700">Import CSV</button>
        </form>



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

                @foreach ($cities as $city )

                <tr>
                    <td class="w-1/3 text-left py-3 px-4">{{ $loop->iteration }}</td>
                    <td class="w-1/3 text-left py-3 px-4">{{ $city->name }}</td>
                    <td class="w-1/3 text-left py-3 px-4 flex">
                        {{-- <button  class="editRole w-10 h-10 bg-blue-500 hover:bg-blue-700 transition duration-300 shadow-md flex justify-center items-center  text-white font-bold py-2 px-4 rounded-full" data-id="{{ $role->id }}" data-name="{{ $role->name }}"><i class="fas fa-edit "></i>  </button> --}}
                       {{-- <form action="{{ route('role.delete',$role->id) }}"  method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus role ini?');">
                        @csrf
                        @method('DELETE')

                         <button class="ml-2 w-10 h-10 flex items-center justify-center bg-red-600 text-white rounded-full hover:bg-red-700 transition duration-300 shadow-md" type="submit" onclick="return confirm('Yakin hapus?')"> <i class="fas fa-trash"></i></button>
                        </form> --}}
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
        <div class="mt-4">
            {{ $cities->links() }}
        </div>
    </div>

    <script>
        document.getElementById("fileInput").addEventListener("change", function() {
            let fileName = this.files.length > 0 ? this.files[0].name : "Tidak ada file";
            document.getElementById("fileName").textContent = fileName;
        });
        </script>



@endsection
