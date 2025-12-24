@extends('admin.layouts.main')

@section('container')
    <div class="w-11/12 mt-6 ml-10">
        <div class="mb-2 flex justify-between">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> Table Profil
            </p>

            <div class="">
                <form action="{{ route('profile.search') }}" method="POST">
                    @csrf
                    <input type="text" placeholder="search"
                        class="w-[400px] text-gray-700 shadow-xs p-1 bg-gray-200 rounded border-[#394053] border-1"
                        name="search">
                    <button type="submit" class="w-[1] bg-gray-400 px-4 py-1 rounded-lg ">search</button>
                </form>
            </div>

            <a href="{{route('profiles.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-3xl"><i class="fas fa-plus"></i>
                data</a>


        </div>

        <div class="bg-white overflow-auto">
            <table class="min-w-full bg-white table-fixed">
                <thead class="bg-[#374151] text-white">
                    <tr>
                        <th class="w-[150px] text-left py-3 px-4 uppercase  text-sm">User</th>
                        <th class="w-[120px] text-left py-3 px-4 uppercase  text-sm">Foto Profile</th>
                        <th class="w-[200px] text-left py-3 px-4 uppercase  text-sm">Nama Lengkap</th>
                        <th class="w-[120px] text-left py-3 px-4 uppercase  text-sm">Panggilan</th>
                        <th class="w-[150px] text-left py-3 px-4 uppercase  text-sm">No HP</th>
                        <th class="w-[300px] text-left py-3 px-4 uppercase  text-sm">Alamat</th>
                        <th class="w-[150px] text-left py-3 px-4 uppercase  text-sm">Provinsi</th>
                        <th class="w-[150px] text-left py-3 px-4 uppercase  text-sm">Kota</th>
                        <th class="w-[150px] text-left py-3 px-4 uppercase  text-sm">Kecamatan</th>
                        <th class="w-[150px] text-left py-3 px-4 uppercase  text-sm">Kelurahan</th>
                        <th class="w-[120px] text-left py-3 px-4 uppercase  text-sm">Jenis Kelamin</th>
                        <th class="w-[150px] text-left py-3 px-4 uppercase  text-sm">Tanggal Lahir</th>
                        <th class="w-[120px] text-left py-3 px-4 uppercase  text-sm">Action</th>

                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($profiles as $profile)
                        <tr>

                            <td class="w-[150px] text-left py-3 px-4 capitalize  text-sm">
                                {{ $profile->user->username ?? 'tidak di isi' }}</td>
                            <td class="w-[120px] text-left py-3 px-4 capitalize  text-sm">
                                <img src="{{ asset('storage/uploads/' . $profile->photo) }}" alt=""
                                    class="w-[100px] h-[100px]">
                            </td>
                            <td class=" text-left py-3 px-4 capitalize  text-sm">{{ $profile->fullName ?? 'tidak di isi' }}
                            </td>
                            <td class=" text-left py-3 px-4 capitalize  text-sm">{{ $profile->nickName ?? 'tidak di isi' }}
                            </td>
                            <td class=" text-left py-3 px-4 capitalize  text-sm">{{ $profile->phone ?? 'tidak di isi' }}
                            </td>
                            <td class=" text-left py-3 px-4 capitalize  text-sm">{{ $profile->address ?? 'tidak di isi' }}
                            </td>
                            <td class=" text-left py-3 px-4 capitalize  text-sm">
                                {{ $profile->province->name ?? 'tidak di isi' }}</td>
                            <td class=" text-left py-3 px-4 capitalize  text-sm">
                                {{ $profile->city->name ?? 'tidak di isi' }}</td>
                            <td class=" text-left py-3 px-4 capitalize  text-sm">
                                {{ $profile->district->name ?? 'tidak ada isi' }}</td>
                            <td class=" text-left py-3 px-4 capitalize  text-sm">
                                {{ $profile->urbanVillage->name ?? 'tidak di isi' }}</td>
                            <td class=" text-left py-3 px-4 capitalize  text-sm">{{ $profile->gender ?? 'tidak di isi' }}
                            </td>
                            <td class=" text-center py-2 ">{{ $profile->dot }}</td>
                            <td class=" text-center py-3 px-5 flex">
                                <a href="/profiles/update/{{ $profile->id }}"
                                    class="w-10 h-10 bg-blue-500 hover:bg-blue-700 transition duration-300 shadow-md flex justify-center items-center  text-white font-bold py-2 px-4 rounded-full"><i
                                        class="fas fa-edit "></i></a>
                                <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus role ini?');">
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
