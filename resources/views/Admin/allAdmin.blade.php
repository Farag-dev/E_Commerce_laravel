@extends('Admin.layouts.app')
@section('title')
all admin
@endsection
@section('content')
<div class="ml-3">
    <a href="{{ route('admin.addAdmin') }}" class="btn btn-primary btn-lg mb-3 "> Add New Admin</a>
</div>
@if (session('success'))
<div class="alert alert-success text-center text-white">
        <h1>{{ session('success') }}</h1>
</div>
@endif
<table class="table bordered">
    <thead class="bg-black">
        <tr>
            <th>#</th>
            <th>code</th>
            <th>name</th>
            <th>delete</th>
            <th>edit</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($admins as $key=>$admin)
        <tr>
           <td>{{ $key+1 }}</td>
            <td>{{ $admin->code }}</td>
            <td>{{ $admin->name }}</td>
            <td>
                <a href="{{ route('admin.deleteAdmin', ['id'=>$admin->id]) }}"><i class="fa fa-trash text-danger"></i></a>
            </td>
            <td>
                 <a  href='{{ route('admin.editAdmin', ['id'=>$admin->id]) }}'><i class="fa fa-edit text-warning"></i></a>

            </td>

        </tr>

        @empty


        <tr >
            <th colspan="4" class="text-center">Not Founded Admins</th>

         </tr>
        @endforelse

    </tbody>
</table>
@endsection
