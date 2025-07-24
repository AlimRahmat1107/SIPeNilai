@extends('admin.layouts.main')

@section('container')

<div class="w-11/12 mt-6 ml-10">
    <div class="mb-2 flex justify-between">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Tabel Tahun Akademik
        </p>

        <div>
            <a href="/academicyear/create" class=" text-white block rounded-2xl py-2 px-4 border border-amber-300 bg-blue-400"> <i class="fas fa-plus"></i>  data</a>
        </div>



    </div>

    <div class="bg-white overflow-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Kode</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Tahun Awal</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Tahun Akhir</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Status</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">

                @foreach ($academicYear as $datas )

                <tr>
                    <td class="w-1/3 text-left py-3 px-4">{{ $loop->iteration }}</td>
                    <td class="w-1/3 text-left py-3 px-4">{{ $datas->academic_year_code }}</td>
                    <td class="w-1/3 text-left py-3 px-4">{{ $datas->start_date}}</td>
                    <td class="w-1/3 text-left py-3 px-4">{{ $datas->end_date}}</td>
                    <td class="w-1/3 text-left py-3 px-4">
                        @if ($datas->is_active)
                            <span class="text-white font-semibold inline-block w-14 text-center rounded-3xl bg-green-400"> Aktif</span>
                        @else
                            <span class="text-red-600 font-semibold">NonAktif</span>
                        @endif
                        </td>
                    <td class="w-1/3 text-left py-3 px-4 flex">
                        <button  class="editRole w-10 h-10 bg-blue-500 hover:bg-blue-700 transition duration-300 shadow-md flex justify-center items-center  text-white font-bold py-2 px-4 rounded-full" data-id="{{ $datas->id }}" data-name="{{ $datas->name }}"><i class="fas fa-edit"></i>  </button>
                       <form action="{{ route('academicyear.delete',$datas->id) }}"  method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus role ini?');">
                        @csrf
                        @method('DELETE')

                         <button class="ml-2 w-10 h-10 flex items-center justify-center bg-red-600 text-white rounded-full hover:bg-red-700 transition duration-300 shadow-md" type="submit" onclick="return confirm('Yakin hapus?')"> <i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>


                @endforeach

            </tbody>
        </table>
        
    </div>
</div>

    <script>
        document.getElementById("fileInput").addEventListener("change", function() {
            let fileName = this.files.length > 0 ? this.files[0].name : "Tidak ada file";
            document.getElementById("fileName").textContent = fileName;
        });
        </script>


@endsection
