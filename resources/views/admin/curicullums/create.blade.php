@extends('admin.layouts.main')

@section('container')
    <div class="w-full mt-6 pl-0 lg:pl-2">
        <p class="text-xl pb-6 flex items-center">
            <i class="fas fa-list mr-3"></i> User Form
        </p>
        <div class="leading-loose">
            <form class="p-10 bg-white rounded shadow-xl" action="{{ route('curicullum.create') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="text-center">
                    <p class="text-lg text-gray-800 font-medium pb-4 ">Tambahkan Profile</p>
                </div>

                <div class="flex w-full justify-between mt-2">
                    <div class="w-[40%]">
                        <span> Informasi Pengguna</span>

                        <div class="mt-1 p-2">
                            <label class="block text-sm mb-1 text-gray-600" for="name">Kurikulum</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name"
                                type="text" required placeholder="Masukan Jurusan">
                        </div>

                        <div class="mt-1 p-2">
                            <label class="block text-sm mb-1 text-gray-600" for="study_program_id">Program Studi</label>
                            <select name="study_program_id" id="study_program_id"
                                class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">
                                <option value="">Select Program Studi</option>
                                @foreach ($studyPrograms as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="mt-1 p-2">
                            <label class="block text-sm mb-1 text-gray-600" for="start_year">Tahun Mulai</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="stat_year"
                                name="start_year" type="text" required placeholder="Masukan Jurusan">
                        </div>

                       
                        <div class="mt-1 p-2">

                            <label class="block text-sm mb-1 text-gray-600" for="is_active">Status </label>

                            <label for="" class="inline-flex items-center ml-2">
                                <input class="p-2" id="is_active" name="is_active" type="radio" value="1">
                                <span class="ml-2">Aktif</span>
                            </label>

                            <label for="" class="inline-flex items-center ml-2">
                                <input class="p-2" id="is_active" name="is_active" type="radio" value="0">
                                <span class="ml-2">Tidak Aktif</span>
                            </label>
                        </div>

                    </div>


                </div>
                <div class="mt-6 flex justify-end">
                    <button
                        class="px-4 py-1 text-white font-light tracking-wider hover:bg-blue-500 transi  bg-gray-900 rounded"
                        type="submit">Tambahkan</button>
                </div>

            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- select provinsi kota kecamatan kelurahan --}}
    <script></script>
@endsection
