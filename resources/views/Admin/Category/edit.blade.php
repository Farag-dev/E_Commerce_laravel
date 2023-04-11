@extends('Admin.layouts.app')
@section('title')
    Update Category
@endsection
@section('content')

    <div class="card p-3 m-auto w-50">
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

    <form method="post" enctype="multipart/form-data" action="{{ route('admin.updateCategory', ['id'=>$category->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">title_en</label>
            <input type="text" placeholder="Enter title_en" name='title_en'class="form-control form-control-lg" value="{{ old('title_en',$category->title_en) }}">
        </div>
        <div class="form-group">
            <label for="">title_ar</label>
            <input type="text" placeholder="Enter title_ar" name='title_ar'class="form-control form-control-lg"value="{{ old('title_ar',$category->title_ar) }}">
        </div>
        <div class="form-group">
            <label for="">logo</label>
            <input type="file"  name='logo'class="form-control form-control-lg">
        </div>

            <button class="btn btn-primary btn-lg d-grid" type="submit">Update Category</button>

    </form>
</div>
@endsection
