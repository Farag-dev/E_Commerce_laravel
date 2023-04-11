@extends('Admin.layouts.app')
@section('title')
all Products
@endsection
@section('content')
<div class="ml-3">
    <a href="{{ route('admin.addProduct') }}" class="btn btn-primary btn-lg mb-3 "> Add New Product</a>
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
            <th>category</th>
            <th>title_en</th>
            <th>title_ar</th>
            <th>price</th>
            <th>quantity</th>
            <th>main_image</th>
            <th>delete</th>
            <th>edit</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($products as $key=>$product)
        <tr>
           <td>{{ $key+1 }}</td>
           <td>{{$product->category->title_en}} - {{ $product->category->title_ar }}</td>
            <td>{{ $product->title_en }}</td>
            <td>{{ $product->title_ar }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>
                @if ($product->main_image)
                    <img src="{{ Storage::url($product->main_image) }}" alt="{{$product->title_en}}" width="70px">
                @else
                    <p>no image</p>
                @endif
            <td>
                <a href="{{ route('admin.deleteProduct', ['id'=>$product->id]) }}"><i class="fa fa-trash text-danger"></i></a>
            </td>
            <td>
                 <a  href='{{ route('admin.editProduct', ['id'=>$product->id]) }}'><i class="fa fa-edit text-warning"></i></a>

            </td>

        </tr>

        @empty


        <tr >
            <th colspan="8" class="text-center">Not Founded products</th>

         </tr>
        @endforelse

    </tbody>
</table>
@endsection
