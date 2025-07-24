@extends('admin.layouts.main')

@section('container')

<div class="w-full mt-6 pl-0 lg:pl-2">
    <p class="text-xl pb-6 flex items-center">
        <i class="fas fa-list mr-3"></i> Academic Year Form
    </p>
    <div class="leading-loose">
        <form class="p-10 bg-white rounded shadow-xl" action="{{ route('academicyear.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="text-center">
                <p class="text-lg text-gray-800 font-medium pb-4 ">Tambahkan Tahun Akademik </p>
            </div>

            <div class="flex w-full justify-between mt-2">
                <div class="w-[40%]">                       

            <div class="mt-1 p-2">
                <label class="block text-sm mb-1 text-gray-600" for="academic_year_code">kode Tahun Akademik</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="academic_year_code" name="academic_year_code" type="text" required placeholder="Kode Tahun Akademmik">
            </div>

            <div class="mt-1 p-2">
                <label class="block text-sm mb-1 text-gray-600" for="start_date">Tahun Awal</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="start_date" name="start_date" type="number" required placeholder="Tahun Awal">
            </div>

            <div class="mt-1 p-2">
                <label class="block text-sm mb-1 text-gray-600" for="end_date">Tahun Akhir</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="end_date" name="end_date" type="number" required placeholder="Tahun Akhir">
            </div>

            <div class="mt-1 p-2">

                <label class="block text-sm mb-1 text-gray-600" for="is_active">Status </label>

                <label for="" class="inline-flex items-center ml-2"> 
                <input class="p-2" id="is_active" name="is_active" type="radio"  value="1">
                <span class="ml-2">Aktif</span>
                </label> 

                <label for="" class="inline-flex items-center ml-2"> 
                <input class="p-2" id="is_active" name="is_active" type="radio"  value="0">
                <span class="ml-2">Tidak Aktif</span>
                </label> 
            </div>


        

        </div>


    </div>
    <div class="mt-6 flex justify-end">
        <button class="px-4 py-1 text-white font-light tracking-wider hover:bg-blue-500 transi  bg-gray-900 rounded" type="submit">Tambahkan</button>
    </div>

        </form>
    </div>
</div>




@endsection
