@extends('admin.layouts.main')

@section('container')
    @if (session('success'))
        <div
        class="fixed bg-green-500 w-[400px] h-[60px] text-center text-white  left-1/2 translate-x-200 
        translate-y-50 opacity-90 rounded-2xl shadow-2xl transition-transform" id="notif">
        <span>success</span><br>
        <span>{{session('success')}}</span>
    </div>
        <script>
               const notif = document.getElementById('notif');
    setTimeout(() => {
         notif.classList.remove('translate-x-200');
        notif.classList.add('translate-x-full');
       
    }, 100);
    setTimeout(() => {
        notif.classList.remove('translate-x-full');
        notif.classList.add('translate-x-200');
    }, 3000);
        </script>
    @endif


      {{-- @if (session('success'))
     <div
        class="fixed bg-green-500 w-[400px] h-[60px] text-center text-white  left-1/2 translate-x-200 
        translate-y-50 opacity-90 rounded-2xl shadow-2xl transition-transform" id="notif">
        <span>success</span><br>
        <span>Data berhasil ditambahkan!!</span>
    </div>
<script>
    const notif = document.getElementById('notif');

    setTimeout(() => {
        notif.classList.remove('translate-x-full');
        notif.classList.add('translate-x-0');
    }, 100);

    setTimeout(() => {
        notif.classList.remove('translate-x-0');
        notif.classList.add('translate-x-full');
    }, 3000);
</script>
    @endif --}}
    <div class="w-11/12 mt-6 ml-10">
        <div class="mb-2 flex justify-between">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> Table User
            </p>

            <div>
                <form action="{{route('search.users')}}" method="POST">
                    @csrf
                    <input class="rounded p-1  bg-gray-300 w-[270px] inline-block placeholder:text-center border border-black"
                        type="text" name="search" id="" placeholder="cari berdasarkan username">
                    <button class=" bg-blue-400 w-[40px] rounded-lg p-1"><i class="fas fa-search text-white"></i></button>
                </form>
            </div>
            <a href="{{ route('users.create') }}"
                class=" text-white block rounded-2xl py-2 px-4 border border-amber-300 bg-blue-400 hover:bg-blue-600"> <i
                    class="fas fa-plus"></i> data</a>
        </div>

        <div class="bg-white overflow-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-[#374151] text-white text-base">
                    <tr class="border-b border-gray-200">
                        <th class="px-4 py-2 text-left  font-medium  uppercase tracking-wider">No</th>
                        <th class="w-1/3 px-4 py-2 text-left  font-medium  uppercase tracking-wider">Username</th>
                        <th class="w-1/3 text-left px-4 py-2 uppercase font-semibold ">email</th>
                        <th class="w-1/3 text-left px-4 py-2 uppercase font-semibold ">Role</th>
                        <th class="w-1/3 text-left px-4 py-2 uppercase font-semibold ">Password</th>
                        <th class="w-1/3 text-center px-4 py-2 uppercase font-semibold ">Action </th>
                    </tr>
                </thead>
                <tbody class="text-gray-800 text-sm">
                    @foreach ($users as $user)
                        <tr>
                            <td class=" text-left py-3 px-4">{{ $loop->iteration }}</td>
                            <td class=" text-left py-3 px-4">{{ $user->username ?? 'tidak di isi' }}</td>
                            <td class=" text-left py-3 px-4">{{ $user->email ?? 'tidak di isi' }}</td>
                            <td class=" text-left py-3 px-4">

                                {{ $user->roles->pluck('name')->implode(',') }}
                            </td>
                            <td class=" text-left py-3 px-4">{{ Str::limit($user->password, 20) }}</td>
                            <td class=" text-left py-3 px-4 flex">
                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="w-10 h-10 bg-blue-500 hover:bg-blue-700 transition duration-300 shadow-md flex justify-center items-center  text-white font-bold py-2 px-4 rounded-full"><i
                                        class="fas fa-edit "></i></a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
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

    <script>

    

    </script>
@endsection
