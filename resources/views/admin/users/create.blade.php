@extends('admin.layouts.main')

@section('container')
<div class="w-full  mt-6 pl-0 lg:pl-2">
    <p class="text-xl pb-6 flex items-center">
        <i class="fas fa-list mr-3"></i> User Form
    </p>
    <div class="leading-loose">
        <form class="p-10 bg-white rounded shadow-xl text-black" action="{{ route('user.post') }}" method="POST">
            @csrf
            <div class="text-center">
            <p class="text-lg text-black font-medium pb-4 ">Tambahkan User</p>
        </div>
            <div class="mt-1 p-2">
                <label class="block text-sm mb-1" for="username">Username</label>
                <input class="w-full px-5 py-1 bg-gray-200 rounded  " id="username" name="username" type="text" required="" placeholder="Your Username" aria-label="Username">
            </div>

            <div class="mt-1 p-2">
                <label class="block text-sm mb-1" for="email">Email</label>
                <input class=" w-full px-5  py-1 bg-gray-200 rounded" id="email" name="email" type="text" required="" placeholder="Your Email" aria-label="Email">
            </div>

            <div class="mt-1 p-2">
                <label class="block text-sm mb-1" for="role">Role</label>
                @foreach ($roles as $role)
                <input type="checkbox" name="roles[]" value="{{ $role->id }}">
                {{ $role->name }} <br>
            @endforeach
            </div>

            <div class="mt-1 p-2">
                <label class="block text-sm mb-1" for="password">Password</label>
                <input class="w-full px-5  py-1 bg-gray-200 rounded" id="password" name="password" type="password" required="" placeholder="Your Password" aria-label="Password">
            </div>

            <div class="mt-1 p-2">
                <label class="block text-sm mb-1" for="password">Password</label>
                <input class="w-full px-5  py-1 bg-gray-200 rounded" id="password" name="password_confirmation" type="password" required="" placeholder="Your Password" aria-label="Password">
            </div>


            <div class="mt-6 flex justify-end">
                <button class="px-4 py-1  text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Tambahkan</button>
            </div>
        </form>
    </div>

</div>

@endsection
