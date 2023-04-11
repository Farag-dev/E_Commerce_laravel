@extends('Admin.layouts.app')
@section('title')
all Tags
@endsection
@section('content')
<div class="ml-3">
    <a href="{{ route('admin.addTag') }}" class="btn btn-primary btn-lg mb-3 "> Add New Tag</a>
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
            <th>delete</th>
            <th>edit</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($tags as $key=>$tag)
        <tr>
           <td>{{ $key+1 }}</td>
            <td>{{ $tag->title_en }}</td>
            <td>{{ $tag->title_ar }}</td>
            <td>
                <a href="{{ route('admin.deleteTag', ['id'=>$tag->id]) }}"><i class="fa fa-trash text-danger"></i></a>
            </td>
            <td>
                 <a  href='{{ route('admin.editTag', ['id'=>$tag->id]) }}'><i class="fa fa-edit text-warning"></i></a>

            </td>

        </tr>

        @empty


        <tr >
            <th colspan="5" class="text-center">Not Founded tags</th>

         </tr>
        @endforelse

    </tbody>
</table>
@endsection
