@extends('Admin.layouts.app')
@section('title')
    Create New Product
@endsection
@section('content')

    <div class="card p-3 m-auto w-75">
        @if (session('success'))
        <div class="alert alert-success text-center text-success">
                <h1>{{ session('success') }}</h1>
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('admin.storeProduct') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6 form-group">
            <label for="">title_en</label>
            <input type="text" placeholder="Enter title_en" name='title_en'class="form-control form-control-lg" value="{{ old('title_en') }}">
            </div>
            <div class="col-6 form-group">
                <label for="">title_ar</label>
                <input type="text" placeholder="Enter title_ar" name='title_ar'class="form-control form-control-lg"value="{{ old('title_ar') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-4 form-group">
            <label for="">category</label>
            <select name="category_id" class="form-control form-control-lg">
                @foreach ($categories as $category)
                    <option {{ old('category_id') == $category->id ?"selected":"" }} value="{{ $category->id }}">{{ $category->title_en }}- {{ $category->title_ar }}</option>
                @endforeach

            </select>
            </div>
            <div class="col-4 form-group">
                <label for="">price</label>
                <input type="number" placeholder="Enter price" name='price'class="form-control form-control-lg"value="{{ old('price') }}">
            </div>
            <div class="col-4 form-group">
                <label for="">quantity</label>
                <input type="number" placeholder="Enter quantity" name='quantity'class="form-control form-control-lg"value="{{ old('quantity') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-6 form-group">
            <label for="">description_en</label>
            <textarea  name='description_en'class="form-control form-control-lg" >{{ old('description_en') }}</textarea>
            </div>
            <div class="col-6 form-group">
                <label for="">description_ar</label>
                <textarea  name='description_ar'class="form-control form-control-lg">{{ old('description_ar') }}</textarea>
            </div>
        </div >
        <div>
        <label for="">tags</label>
        <select name="tags[]" multiple class="form-control form-control-lg">
            @foreach ($tags as $tag)
                <option  value="{{ $tag->id }}">{{ $tag->title_en }}- {{ $tag->title_ar }}</option>
            @endforeach

        </select>
        </div>

        <div class="form-group">
            <label for="">main_image</label>
            <input type="file"  name='main_image'class="form-control form-control-lg">
        </div>

            <button class="btn btn-primary btn-lg d-grid" type="submit">Add Product</button>

    </form>
</div>
@endsection
