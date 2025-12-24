@extends('admin.layouts.main')

@section('container')
    <div class="w-full  mt-6 pl-0 lg:pl-2">


        <p class="text-xl pb-6 flex items-center">
            <i class="fas fa-list mr-3"></i> User Form
        </p>
        <div class="leading-loose">
            <form class="p-10 bg-white rounded shadow-xl" action="{{ route('users.update',$users->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="text-center">
                    <p class="text-lg text-black font-medium pb-4 ">Tambahkan User</p>
                </div>
                <div class="mt-1 p-2">
                    <label class="block text-sm mb-1 text-black " for="name">Name</label>
                    <input class="w-full px-5 py-1  bg-gray-200 rounded" id="name" name="username"
                        type="text" required="" placeholder="Your Name" value="{{ $users->username }}"
                        aria-label="Name">
                </div>

                <div class="mt-1 p-2">
                    <label class="block text-sm mb-1 text-black " for="email">Email</label>
                    <input class="w-full px-5  py-1  bg-gray-200 rounded" id="email" name="email"
                        type="text" required="" placeholder="Your Email" value="{{ $users->email }}" aria-label="Email">
                </div>

                <div class="mt-1 p-2">
                    <label class="block text-sm mb-1 text-black " for="role">Role</label>
                    @foreach ($roles as $role)
                    <input type="checkbox" name="roles[]" value="{{ $role->id }}" {{ in_array($role->id, $users->roles->pluck('id')->toArray()) ? 'checked' : '' }}>{{ $role->name }} <br>

                @endforeach
                </div>


                <div class="mt-1 p-2">
                    <label class="block text-sm mb-1 text-black " for="password">Password</label>
                    <input class="w-full px-5  py-1 bg-gray-200 rounded" id="password" name="password"
                        type="text" required="" placeholder="Your Password" value="{{ $users->password }}" aria-label="Password">
                </div>

                <div class="mt-1 p-2">
                    <label class="block text-sm mb-1 text-black " for="password">Password</label>
                    <input class="w-full px-5  py-1 bg-gray-200 rounded" id="password"
                        name="password_confirmation" type="text" required="" placeholder="Your Password" value="{{ $users->password }}"
                        aria-label="Password">
                </div>


                <div class="mt-6 flex justify-end">
                    <button class="px-4 py-1  text-white font-light tracking-wider bg-gray-900 rounded"
                        type="submit">Update</button>
                </div>
            </form>
        </div>

    </div>
@endsection
