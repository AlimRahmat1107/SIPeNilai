@extends('admin.layouts.main')

@section('container')
    <div class="w-full mt-6 pl-0 lg:pl-2">
        <p class="text-xl pb-6 flex items-center">
            <i class="fas fa-list mr-3"></i> Major Form
        </p>
        <div class="leading-loose">
            <form class="p-10 bg-white rounded shadow-xl" action="{{ route('majors.update', $majors->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="text-center">
                    <p class="text-lg text-gray-800 font-medium pb-4 ">Tambahkan Jurusan</p>
                </div>

                <div class="mt-1 p-2">
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="id" name="id"
                        type="hidden" required placeholder="Nama Lengkap" value="{{ $majors->id }}">
                </div>

                <div class="flex w-full justify-between mt-2">
                    <div class="w-[40%]">







                        <div class="mt-1 p-2">
                            <label class="block text-sm mb-1 text-gray-600" for="name">Nama Jurusan</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name"
                                type="text" required placeholder="Nama Panggilan" value="{{ $majors->name }}">
                        </div>




                    </div>




                </div>
                <div class="mt-6 flex justify-end">
                    <button
                        class="px-4 py-1 text-white font-light tracking-wider hover:bg-blue-500 transi  bg-gray-900 rounded"
                        type="submit">Tambahkan</button>
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
                                $('#city').append('<option value="' + value.id + '">' +
                                    value.name + '</option>');
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
                            $('#subdistrict').empty().append(
                                '<option value="">Pilih Kecamatan</option>');
                            $.each(data, function(key, value) {
                                $('#subdistrict').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
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
                            $('#ward').empty().append(
                                '<option value="">Pilih Kelurahan</option>');
                            $.each(data, function(key, value) {
                                $('#ward').append('<option value="' + value.id + '">' +
                                    value.name + '</option>');
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
