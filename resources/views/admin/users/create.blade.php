@extends('admin.layouts.main')

@section('container')
    <div class="w-full  mt-6 pl-0 lg:pl-2">
        <p class="text-xl pb-6 flex items-center">
            <i class="fas fa-list mr-3"></i> User Form
        </p>
        <div class="leading-loose">
           @include('admin.users.form')
        </div>

    </div>
@endsection
