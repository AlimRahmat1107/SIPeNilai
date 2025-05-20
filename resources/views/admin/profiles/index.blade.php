@extends('admin.layouts.main')

@section('container')
    <div class="w-11/12 mt-6 ml-10">
        <div class="mb-2 flex justify-between">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> Table User
            </p>

            <div class="">
                <form action="{{ route('profile.search') }}" method="POST">
                @csrf
                <input type="text" placeholder="search" class="w-[400px] text-gray-700 shadow-xs p-1 bg-gray-200 rounded border-[#394053] border-1" name="search">
                <button type="submit" class="w-[1] bg-gray-400 px-4 py-1 rounded-lg ">search</button>
                </form>
            </div>

            <a href="/profiles/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah
                data</a>


        </div>

        <div class="bg-white overflow-auto">
            <table class="min-w-full bg-white table-fixed">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-[150px] text-left py-3 px-4 uppercase font-semibold text-sm">User</th>
                        <th class="w-[120px] text-left py-3 px-4 uppercase font-semibold text-sm">Foto Profile</th>
                        <th class="w-[200px] text-left py-3 px-4 uppercase font-semibold text-sm">Nama Lengkap</th>
                        <th class="w-[120px] text-left py-3 px-4 uppercase font-semibold text-sm">Panggilan</th>
                        <th class="w-[150px] text-left py-3 px-4 uppercase font-semibold text-sm">No HP</th>
                        <th class="w-[300px] text-left py-3 px-4 uppercase font-semibold text-sm">Alamat</th>
                        <th class="w-[150px] text-left py-3 px-4 uppercase font-semibold text-sm">Provinsi</th>
                        <th class="w-[150px] text-left py-3 px-4 uppercase font-semibold text-sm">Kota</th>
                        <th class="w-[150px] text-left py-3 px-4 uppercase font-semibold text-sm">Kecamatan</th>
                        <th class="w-[150px] text-left py-3 px-4 uppercase font-semibold text-sm">Kelurahan</th>
                        <th class="w-[120px] text-left py-3 px-4 uppercase font-semibold text-sm">Jenis Kelamin</th>
                        <th class="w-[150px] text-left py-3 px-4 uppercase font-semibold text-sm">Tanggal Lahir</th>
                        <th class="w-[120px] text-left py-3 px-4 uppercase font-semibold text-sm">Action</th>

                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($profiles as $profile)
                        <tr>
                            <td class="w-[150px] text-left py-3 px-4 capitalize font-semibold text-sm">{{ $profile->users->username }}</td>
                            <td class="w-[120px] text-left py-3 px-4 capitalize font-semibold text-sm">
                                <img src="{{ asset('uploads/' . $profile->picture) }}" alt="" class="w-[40px] h-[40px]">
                              </td>

                            <td class="w-[200px] text-left py-3 px-4 capitalize font-semibold text-sm">{{ $profile->fullName }}</td>
                            <td class="w-[120px] text-left py-3 px-4 capitalize font-semibold text-sm">{{ $profile->nickName }}</td>
                            <td class="w-[150px] text-left py-3 px-4 capitalize font-semibold text-sm">{{ $profile->phone }}</td>
                            <td class="w-[300px] text-left py-3 px-4 capitalize font-semibold text-sm">{{ $profile->address }}</td>
                            <td class="w-[150px] text-left py-3 px-4 capitalize font-semibold text-sm">{{ $profile->provinces->name }}</td>
                            <td class="w-[150px] text-left py-3 px-4 capitalize font-semibold text-sm">{{ $profile->cities->name }}</td>
                            <td class="w-[150px] text-left py-3 px-4 capitalize font-semibold text-sm">{{ $profile->subdistricts->name }}</td>
                            <td class="w-[150px] text-left py-3 px-4 capitalize font-semibold text-sm">{{ $profile->wards->name }}</td>
                            <td class="w-[120px] text-left py-3 px-4 capitalize font-semibold text-sm">{{ $profile->gender }}</td>
                            <td class="w-[120px] text-center py-2 px-4">{{ $profile->dot }}</td>
                            <td class="w-[150px] text-center py-3 px-4">
                                <a href="/profiles/update/{{ $profile->id }}" class="w-10 h-10 bg-blue-500 hover:bg-blue-700 transition duration-300 shadow-md flex justify-center items-center  text-white font-bold py-2 px-4 rounded-full"><i class="fas fa-edit "></i></a>
                                <form action="{{ route('user.delete',$profile->id) }}"  method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus role ini?');">
                                    @csrf
                                    @method('DELETE')

                                     <button class="ml-2 w-10 h-10 flex items-center justify-center bg-red-600 text-white rounded-full hover:bg-red-700 transition duration-300 shadow-md" type="submit" onclick="return confirm('Yakin hapus?')"> <i class="fas fa-trash"></i></button>
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
