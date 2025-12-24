 <form class="p-10 bg-white rounded shadow-xl text-black" action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="text-center">
                    <p class="text-lg text-black font-medium pb-4 ">Tambahkan User</p>
                </div>

                <div class="mt-1 p-2">
                    <label class="block text-sm mb-1" for="username">Username</label>
                    <input class="w-full px-5 py-1 bg-gray-200 rounded  " id="username" name="username" type="text" value="{{$user?old(''):}}"
                        required="" placeholder="Your Username" aria-label="Username">
                    @error('username')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>



                <div class="mt-1 p-2">
                    <label class="block text-sm mb-1" for="email">Email</label>
                    <input class=" w-full px-5  py-1 bg-gray-200 rounded" id="email" name="email" type="text"
                        required="" placeholder="Your Email" aria-label="Email">
                          @error('email')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-1 p-2">
                    <label class="block text-sm mb-1" for="role">Role</label>
                    @foreach ($roles as $role)
                        <input type="checkbox" name="roles[]" value="{{ $role->id }}" >
                        {{ $role->name }} <br>
                    @endforeach
                      @error('roles')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-1 p-2">
                    <label class="block text-sm mb-1" for="password">Password</label>
                    <input class="w-full px-5  py-1 bg-gray-200 rounded" id="password" name="password" type="password"
                        required="" placeholder="Your Password" aria-label="Password">
                          @error('password_confirmation')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-1 p-2">
                    <label class="block text-sm mb-1" for="password">Konfirmasi Password</label>
                    <input class="w-full px-5  py-1 bg-gray-200 rounded" id="password" name="password_confirmation"
                        type="password" required="" placeholder="Your Password" aria-label="Password">
                          @error('password_confirmation')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mt-6 flex justify-end">
                    <button class="px-4 py-1  text-white font-light tracking-wider bg-gray-900 rounded"
                        type="submit">Tambahkan</button>
                </div>
            </form>