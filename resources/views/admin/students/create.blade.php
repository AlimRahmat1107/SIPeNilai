@extends('admin.layouts.main')

@section('container')
    <div class="w-full mt-6 pl-0 lg:pl-2">
        <p class="text-xl pb-6 flex items-center">
            <i class="fas fa-list mr-3"></i> User Form
        </p>
        <div class="leading-loose">
            <form class="p-10 bg-white rounded shadow-xl" action="{{ route('student.create') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="text-center">
                    <p class="text-lg text-gray-800 font-medium pb-4 ">Tambahkan Profile</p>
                </div>

                <div class="flex w-full justify-between mt-2">
                    <div class="w-[40%]">
                        <span> Informasi Pengguna</span>

                        <div class="mt-1 p-2">
                            <label class="block text-sm mb-1 text-gray-600" for="name">Nama</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name"
                                type="text" required placeholder="Nama Mahasiswa">
                        </div>

                        <div class="mt-1 p-2">
                            <label class="block text-sm mb-1 text-gray-600" for="class_id">Kelas</label>
                            <select name="class_id" id="class_id"
                                class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">
                                <option value="">Kelas</option>
                                @foreach ($kelases as $data)
                                    <option value="{{ $data->id }}">{{ $data->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-1 p-2">
                            <label class="block text-sm mb-1 text-gray-600" for="study_program_id">Program Studi</label>
                            <select name="study_program_id" id="study_program_id"
                                class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">
                                <option value="">Program Studi</option>
                                @foreach ($studyPrograms as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
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
