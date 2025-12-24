@extends('admin.layouts.main')

@section('container')

<div class="w-full mt-6 pl-0 lg:pl-2">
    <p class="text-xl pb-6 flex items-center">
        <i class="fas fa-list mr-3"></i> Profile Form
    </p>
    <div class="leading-loose">
        <form class="p-10 bg-white rounded shadow-xl" action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="text-center">
                <p class="text-lg text-gray-800 font-medium pb-4 ">Tambahkan Profil</p>
            </div>

            <div class="flex w-full justify-between mt-2">
                <div class="w-[40%]">
                    <span> Informasi Pengguna</span>
            <div class="mt-1 p-2">
                <label class="block text-sm mb-1 text-gray-600" for="user_id">User</label>
                <select name="user_id" id="user_id" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">
                    <option value="">Select User</option>
                    @foreach ($users as $data)
                        <option value="{{ $data->id }}">{{ $data->username }}</option>
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
                    <label class="block text-sm mb-1 text-gray-600" for="photo ">Foto Profile </label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="photo " name="photo" type="file" required placeholder="Nama Lengkap">
                </div>

            <div class="mt-1 p-2">
                <label class="block text-sm mb-1 text-gray-600" for="fullName">Nama Lengkap</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="fullName" name="fullName" type="text" required placeholder="Nama Lengkap">
            </div>


            <div class="mt-1 p-2">
                <label class="block text-sm mb-1 text-gray-600" for="nickName">Nama Panggilan</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="nickName" name="nickName" type="text" required placeholder="Nama Panggilan">
            </div>

            <div class="mt-1 p-2">
                <label class="block text-sm mb-1 text-gray-600" for="phone">Nomor HP</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="phone" name="phone" type="text" required placeholder="Nomor HP">
            </div>

            <div class="mt-1 p-2">
                <label class="block text-sm mb-1 text-gray-600" for="address">Alamat</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="address" name="address" type="text" required placeholder="Alamat Lengkap">
            </div>

            <div class="mt-1 p-2">
                <label class="block text-sm mb-1 text-gray-600" for="province_id">Tanggal Lahir</label>
                <select name="gender" id="gender" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">
                    <option value="">Pilih Jenis Kelamin</option>
                        <option value="LAKI-LAKI">Laki-laki</option>
                        <option value="PEREMPUAN">Perempuan</option>
                </select>
            </div>

            <div class="mt-1 p-2">
                <label class="block text-sm mb-1 text-gray-600" for="dot">Tanggal Lahir</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="dot" name="dot" type="date" required placeholder="Tanggal lahir">
            </div>

                </div>

                <div class=" w-[50%]">
                    <span> Informasi Wilayah</span>


            <div class="mt-1 p-2">
                <label class="block text-sm mb-1 text-gray-600" for="province_id">Provinsi</label>
                <select name="province_id" id="province" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">
                    <option value="">Pilih Provinsi</option>
                    @foreach ($provinces as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-1 p-2">
                <label class="block text-sm mb-1 text-gray-600" for="city_id">Kota</label>
                <select name="city_id" id="city" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">
                    <option value="">Pilih Kota</option>
                </select>
            </div>

            <div class="mt-1 p-2">
                <label class="block text-sm mb-1 text-gray-600" for="district_id">Kecamatan</label>
                <select name="district_id" id="district" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">
                    <option value="">Pilih Kecamatan</option>
                </select>
            </div>

            <div class="mt-1 p-2">
                <label class="block text-sm mb-1 text-gray-600" for="urban_village_id">Kelurahan</label>
                <select name="urban_village_id" id="urban-village" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">
                    <option value="">Pilih Kelurahan</option>
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
        $('#province').change(function() {
            let provinceID = $(this).val();
            if (provinceID) {
                $.ajax({
                    url: '/admin/get-city/' + provinceID,
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
                    url: '/admin/get-district/' + cityID,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {

                        //subdistrict
                        $('#district').empty().append('<option value="">Pilih kecamatan</option>');
                        $.each(data, function(key, value) {
                            $('#district').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });


                    }
                });
            } else {
                $('#district').empty().append('<option value="">Pilih Kota</option>');
            }
        });
    });

    $(document).ready(function() {
        $('#district').change(function() {
            let districtID = $(this).val();
            console.log(districtID);
            if (districtID) {
                $.ajax({
                    url: '/admin/get-urban-village/' + districtID,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {



                        //ward
                        $('#urban-village').empty().append('<option value="">Pilih Kelurahan</option>');
                        $.each(data, function(key, value) {
                            $('#urban-village').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#urban-village').empty().append('<option value="">Pilih Kota</option>');
            }
        });
    });
</script>


@endsection
