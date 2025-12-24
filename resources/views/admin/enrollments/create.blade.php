@extends('admin.layouts.main')

@section('container')
    <div class="w-full mt-6 pl-0 lg:pl-2">
        <p class="text-xl pb-6 flex items-center">
            <i class="fas fa-list mr-3"></i> User Form
        </p>
        <div class="leading-loose">
            <form class="p-10 bg-white rounded shadow-xl" action="{{ route('enrollments.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="text-center">
                    <p class="text-lg text-gray-800 font-medium pb-4 ">Tambahkan Profile</p>
                </div>

                <div class="flex w-full justify-between mt-2">
                    <div class="w-[40%]">
                        <span> Informasi Pengguna</span>

                        <div class="mt-1 p-2">
                            <label class="block text-sm mb-1 text-gray-600" for="lecture_id">Dosen</label>
                            <select name="lecture_id" id="lecture_id"
                                class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">
                                <option value="">Select Dosen</option>
                                @foreach ($lecturs as $data)
                                    <option value="{{ $data->id }}">{{ $data->user->username }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="mt-1 p-2">
                            <label class="block text-sm mb-1 text-gray-600" for="semester_id">Semester</label>
                            <select name="semester_id" id="semester_id"
                                class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">
                                <option value="">Select Semester</option>
                                @foreach ($semesters as $data)
                                    <option value="{{ $data->id }}">{{ $data->code }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-1 p-2">
                            <label class="block text-sm mb-1 text-gray-600" for="student_id">Mahasiswa</label>
                            <select name="student_id" id="student_id"
                                class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">
                                <option value="">Select Mahasiswa</option>
                                @foreach ($students as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-1 p-2">
                            <label class="block text-sm mb-1 text-gray-600" for="csc_id">csc</label>
                            <select name="csc_id" id="csc_id"
                                class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">
                                <option value="">Select csc</option>
                                @foreach ($csc as $data)
                                    <option value="{{ $data->id }}">{{ $data->course->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-1 p-2">
                            <label class="block text-sm mb-1 text-gray-600" for="scs_id">scs</label>
                            <select name="scs_id" id="scs_id"
                                class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">
                                <option value="">Select scs</option>
                                @foreach ($scs as $data)
                                    <option value="{{ $data->id }}">{{ $data->kelas->name }}</option>
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
