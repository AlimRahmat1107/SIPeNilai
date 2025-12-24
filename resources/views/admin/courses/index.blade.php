@extends('admin.layouts.main')

@section('container')
    <div class="w-11/12 mt-6 ml-10">
        <div class="mb-2 flex justify-between">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> Table Matakuliah
            </p>
            <div>
                <a href="/matakuliah/create"
                    class=" text-white block rounded-2xl py-2 px-4 border border-amber-300 bg-blue-400"> <i
                        class="fas fa-plus"></i> data</a>
            </div>
        </div>

        <div class="bg-white overflow-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-[#374151] text-white text-base">
                    <tr class="border-b border-gray-200">
                        <th class="px-4 py-2 text-left  font-medium  uppercase tracking-wider">No</th>
                        <th class="w-1/3 px-4 py-2 text-left  font-medium  uppercase tracking-wider">Matakuliah</th>
                        <th class="w-1/3 px-4 py-2 text-left  font-medium  uppercase tracking-wider">Kode Matakuliah</th>
                        <th class="w-1/3 text-center px-4 py-2 uppercase font-semibold ">Action </th>
                    </tr>
                </thead>
                <tbody class="text-gray-800 text-sm">
                    @foreach ($courses as $data)
                        <tr>
                            <td class=" text-left py-3 px-4">{{ $loop->iteration }}</td>
                            <td class=" text-left py-3 px-4">{{ $data->name }}</td>
                            <td class=" text-left py-3 px-4">{{ $data->code }}</td>
                            <td class=" text-left py-3 px-4 flex">
                                <a href="/user/update/{{ $data->id }}"
                                    class="w-10 h-10 bg-blue-500 hover:bg-blue-700 transition duration-300 shadow-md flex justify-center items-center  text-white font-bold py-2 px-4 rounded-full"><i
                                        class="fas fa-edit "></i></a>
                                <form action="{{ route('courses.destroy', $data->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="ml-2 w-10 h-10 flex items-center justify-center bg-red-600 text-white rounded-full hover:bg-red-700 transition duration-300 shadow-md"
                                        type="submit" onclick="return confirm('Yakin hapus?')"> <i
                                            class="fas fa-trash"></i></button>
                                </form>

                            </td>
                            {{-- <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">
                                    {{ $user->roles->name }}</a></td> --}}
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>


    </div>
@endsection
