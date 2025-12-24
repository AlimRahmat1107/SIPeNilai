@extends('admin.layouts.main')

@section('container')

    <div class="w-full mt-6 pl-0 lg:pl-2">
        <p class="text-xl pb-6 flex items-center">
            <i class="fas fa-list mr-3"></i> Academic Year Form
        </p>
        <div class="leading-loose p-10 bg-white rounded shadow-xl">
            <div class="text-center">
                <p class="text-lg text-gray-800 font-medium pb-4 ">Tambahkan Tahun Akademik </p>
            </div>

            <form class="p-10" action="{{ route('academicyears.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                @include('admin.academic-year.form')

            </form>
        </div>
    </div>
