@extends('admin.layouts.main')

@section('container')

<div class="w-full mt-6 pl-0 lg:pl-2">
    <p class="text-xl pb-6 flex items-center">
        <i class="fas fa-list mr-3"></i> User Form
    </p>
    <div class="leading-loose">
        <form class="p-10 bg-white rounded shadow-xl" action="{{ route('profile.update',$dataProfiles->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="text-center">
                <p class="text-lg text-gray-800 font-medium pb-4 ">Tambahkan Profile</p>
            </div>

            <div class="mt-1 p-2">
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="picture " name="picture" type="hidden" required placeholder="Nama Lengkap" value="{{ $dataProfiles->id }}">
            </div>

            <div class="flex w-full justify-between mt-2">
                <div class="w-[40%]">
                    <span> Informasi Pengguna</span>
            <div class="mt-1 p-2">
                <label class="block text-sm mb-1 text-gray-600" for="user_id">User</label>
                <select name="user_id" id="user_id" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">
                    <option value="{{ $dataProfiles->users->id }}">{{ $dataProfiles->users->username }}</option>
                    @foreach ($dataUsers as $user)

                        <option value="{{ $user->id  }}">{{ $user->username }}</option>
                    @endforeach
                </select>
            </div>



            {{-- <div class="mt-1 p-2">
                <label class="block text-sm mb-3 text-gray-600" for="fullName">Foto Profile</label>
                <input type="file" id="fileInput" name="file" class="hidden">
                <label for="fileInput" class="px-4 py-2 mx-1 bg-blue-500 text-white rounded cursor-pointer hover:bg-blue-700">
                    Pilih File
                </label>
                <span id="fileName" class=" text-gray-700 bg-gray-200 rounded">Tidak ada file</span>
                </div> --}}

                <div class="mt-1 p-2">
                    <label class="block text-sm mb-1 text-gray-600" for="picture ">Foto Profile </label>
                    <img src="" alt="">
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="picture" name="picture" type="file" required placeholder="Nama Lengkap" value="{{ $dataProfiles->picture }}">
                </div>

            <div class="mt-1 p-2">
                <label class="block text-sm mb-1 text-gray-600" for="fullName">Nama Lengkap</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="fullName" name="fullName" type="text" required placeholder="Nama Lengkap" value="{{ $dataProfiles->fullName }}">
            </div>


            <div class="mt-1 p-2">
                <label class="block text-sm mb-1 text-gray-600" for="nickName">Nama Panggilan</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="nickName" name="nickName" type="text" required placeholder="Nama Panggilan" value="{{ $dataProfiles->nickName }}">
            </div>

            <div class="mt-1 p-2">
                <label class="block text-sm mb-1 text-gray-600" for="phone">Nomor HP</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="phone" name="phone" type="text" required placeholder="Nomor HP" value="{{ $dataProfiles->phone }}">
            </div>

            <div class="mt-1 p-2">
                <label class="block text-sm mb-1 text-gray-600" for="address">Alamat</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="address" name="address" type="text" required placeholder="Alamat Lengkap" value="{{ $dataProfiles->address }}">
            </div>

            <div class="mt-1 p-2">
                <label class="block text-sm mb-1 text-gray-600" for="province_id">Tanggal Lahir</label>
                <select name="gender" id="gender" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">
                    <option value="{{ $dataProfiles->gender }}"> {{ $dataProfiles->gender }}</option>
                        <option value="LAKI-LAKI">Laki-laki</option>
                        <option value="PEREMPUAN">Perempuan</option>
                </select>
            </div>

            <div class="mt-1 p-2">
                <label class="block text-sm mb-1 text-gray-600" for="dot">Tanggal Lahir</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="dot" name="dot" type="date" required placeholder="Tanggal lahir" value="{{ $dataProfiles->dot }}">
            </div>

                </div>

                <div class=" w-[50%]">
                    <span> Informasi Wilayah</span>


            <div class="mt-1 p-2">
                <label class="block text-sm mb-1 text-gray-600" for="province_id">Provinsi</label>
                <select name="province_id" id="provinsi" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">
                    <option value=" {{ $dataProfiles->province_id }}"> {{ $dataProfiles->provinces->name }}</option>
                    @foreach ($dataProvinces as $province)
                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-1 p-2">
                <label class="block text-sm mb-1 text-gray-600" for="city_id">Kota</label>
                <select name="city_id" id="city" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">
                    <option value=" {{ $dataProfiles->city_id }}"> {{ $dataProfiles->cities->name }}</option>
                </select>
            </div>

            <div class="mt-1 p-2">
                <label class="block text-sm mb-1 text-gray-600" for="subdistrict_id">Kecamatan</label>
                <select name="subdistrict_id" id="subdistrict" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">
                    <option value=" {{ $dataProfiles->subdistrict_id }}"> {{ $dataProfiles->subdistricts->name }}</option>
                </select>
            </div>

            <div class="mt-1 p-2">
                <label class="block text-sm mb-1 text-gray-600" for="ward_id">Kelurahan</label>
                <select name="ward_id" id="ward" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">
                    <option value=" {{ $dataProfiles->ward_id }}"> {{ $dataProfiles->wards->name }}</option>
                </select>
            </div>




        </div>


    </div>
    <div class="mt-6 flex justify-end">
        <button class="px-4 py-1 text-white font-light tracking-wider hover:bg-blue-500 transi  bg-gray-900 rounded" type="submit">Tambahkan</button>
    </div>

        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- select provinsi kota kecamatan kelurahan --}}
<script>
    $(document).ready(function() {
        $('#provinsi').change(function() {
            let provinsiID = $(this).val();
            if (provinsiID) {
                $.ajax({
                    url: '/get-kota/' + provinsiID,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        //city
                        $('#city').empty().append('<option value="">Pilih Kota</option>');
                        $.each(data, function(key, value) {
                            $('#city').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });


                    }
                });
            } else {
                $('#city').empty().append('<option value="">Pilih Kota</option>');
            }
        });
    });

    $(document).ready(function() {
        $('#city').change(function() {
            let cityID = $(this).val();
            console.log(cityID);
            if (cityID) {
                $.ajax({
                    url: '/get-kecamatan/' + cityID,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {

                        //subdistrict
                        $('#subdistrict').empty().append('<option value="">Pilih Kecamatan</option>');
                        $.each(data, function(key, value) {
                            $('#subdistrict').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });


                    }
                });
            } else {
                $('#subdistrict').empty().append('<option value="">Pilih Kota</option>');
            }
        });
    });

    $(document).ready(function() {
        $('#subdistrict').change(function() {
            let subdistrictID = $(this).val();
            console.log(subdistrictID);
            if (subdistrictID) {
                $.ajax({
                    url: '/get-kelurahan/' + subdistrictID,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {



                        //ward
                        $('#ward').empty().append('<option value="">Pilih Kelurahan</option>');
                        $.each(data, function(key, value) {
                            $('#ward').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#ward').empty().append('<option value="">Pilih Kota</option>');
            }
        });
    });
</script>


@endsection
