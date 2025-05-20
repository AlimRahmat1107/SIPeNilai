@extends('admin.layouts.main')

@section('container')
    <div class="w-11/12 mt-6 ml-10">
        <div class="mb-2 flex justify-between">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> Table User
            </p>
            <a href="/user-create" class="bg-blue-500   hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-plus mr-1"></i>Tambah
                data</a>
        </div>

        <div class="bg-white overflow-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-[#374151] text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">Username</th>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">email</th>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Role</th>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Password</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Action  </th>
                    </tr>
                </thead>
                <tbody class="text-gray-800 ">
                    @foreach ($users as $user)
                        <tr>
                            <td class=" text-left py-3 px-4">{{ $loop->iteration }}</td>
                            <td class=" text-left py-3 px-4">{{ $user->username }}</td>
                            <td class=" text-left py-3 px-4">{{ $user->email }}</td>
                            <td class=" text-left py-3 px-4">

                                {{ $user->roles->pluck('name')->implode(', ') }}
                                </td>
                            <td class=" text-left py-3 px-4">{{ Str::limit($user->password,20) }}</td>
                            <td class=" text-left py-3 px-4 flex">
                                <a href="/user/update/{{ $user->id }}" class="w-10 h-10 bg-blue-500 hover:bg-blue-700 transition duration-300 shadow-md flex justify-center items-center  text-white font-bold py-2 px-4 rounded-full"><i class="fas fa-edit "></i></a>
                                <form action="{{ route('user.delete',$user->id) }}"  method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus role ini?');">
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
