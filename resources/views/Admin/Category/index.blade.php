@extends('Admin.layouts.app')
@section('title')
all Categories
@endsection
@section('content')
<div class="ml-3">
    <a href="{{ route('admin.addCategory') }}" class="btn btn-primary btn-lg mb-3 "> Add New Category</a>
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
            <th>title_en</th>
            <th>title_ar</th>
            <th>logo</th>
            <th>delete</th>
            <th>edit</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($categories as $key=>$category)
        <tr>
           <td>{{ $key+1 }}</td>
            <td>{{ $category->title_en }}</td>
            <td>{{ $category->title_ar }}</td>
            <td>
                @if ($category->logo)
                    <img src="{{ Storage::url($category->logo) }}" alt="{{$category->title_en}}" width="70px">
                @else
                    <p>no logo</p>
                @endif
            <td>
                <a href="{{ route('admin.deleteCategory', ['id'=>$category->id]) }}"><i class="fa fa-trash text-danger"></i></a>
            </td>
            <td>
                 <a  href='{{ route('admin.editCategory', ['id'=>$category->id]) }}'><i class="fa fa-edit text-warning"></i></a>

            </td>

        </tr>

        @empty


        <tr >
            <th colspan="6" class="text-center">Not Founded categories</th>

         </tr>
        @endforelse

    </tbody>
</table>
@endsection
