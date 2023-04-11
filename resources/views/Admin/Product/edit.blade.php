@extends('Admin.layouts.app')
@section('title')
    Edit Product
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

    <form method="post" action="{{ route('admin.updateProduct', ['id'=>$product->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-6 form-group">
            <label for="">title_en</label>
            <input type="text" placeholder="Enter title_en" name='title_en'class="form-control form-control-lg" value="{{ $product->title_en }}">
            </div>
            <div class="col-6 form-group">
                <label for="">title_ar</label>
                <input type="text" placeholder="Enter title_ar" name='title_ar'class="form-control form-control-lg"value="{{ $product->title_ar }}">
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
                <input type="number" placeholder="Enter price" name='price'class="form-control form-control-lg"value="{{ $product->price}}">
            </div>
            <div class="col-4 form-group">
                <label for="">quantity</label>
                <input type="number" placeholder="Enter quantity" name='quantity'class="form-control form-control-lg"value="{{ $product->quantity }}">
            </div>
        </div>
        <div class="row">
            <div class="col-6 form-group">
            <label for="">description_en</label>
            <textarea  name='description_en'class="form-control form-control-lg" >{{ $product->description_en }}</textarea>
            </div>
            <div class="col-6 form-group">
                <label for="">description_ar</label>
                <textarea  name='description_ar'class="form-control form-control-lg">{{ $product->description_ar  }}</textarea>
            </div>
        </div>
        <div>
            <label for="">tags</label>
            <select name="tags[]" multiple class="form-control form-control-lg">
                @foreach ($tags as $tag)
                    <option  {{ $product->tags->contains($tag)?"selected":"" }} value="{{ $tag->id }}">{{ $tag->title_en }}- {{ $tag->title_ar }}</option>
                @endforeach

            </select>
            </div>

        <div class="form-group">
            <label for="">main_image</label>
            <input type="file"  name='main_image'class="form-control form-control-lg">
        </div>
        <div class="row">
            <div class="col-3 form-group">
            <label for="">key_en</label>
            <input type="text" placeholder="Enter key_en" name='key_en'class="form-control form-control-lg">
            </div>
            <div class="col-3 form-group">
                <label for="">value_en</label>
                <input type="text" placeholder="Enter value_en" name='value_en'class="form-control form-control-lg">
            </div>
            <div class="col-3 form-group">
                <label for="">key_ar</label>
                <input type="text" placeholder="Enter key_ar" name='key_ar'class="form-control form-control-lg">
            </div>
            <div class="col-3 form-group">
                <label for="">value_ar</label>
                <input type="text" placeholder="Enter value_ar" name='value_ar'class="form-control form-control-lg">
            </div>
        </div>

            <button class="btn btn-primary btn-lg d-grid" type="submit">update Product</button>

    </form>
     <div class="row">
        <h3 class="col-12">Product Properties</h3>
        @forelse ($product->props as $prop)
<form class="col-8"id='updateprop{{ $prop->id }}'method='post' action='{{ route('admin.updateProductProp', ['id'=>$prop->id]) }}'>
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-3 form-group">
            <label for="">key_en</label>
            <input type="text" placeholder="Enter key_en" name='key_en'class="form-control form-control-lg" value="{{ $prop->key_en }}">
            </div>
            <div class="col-3 form-group">
                <label for="">value_en</label>
                <input type="text" placeholder="Enter value_en" name='value_en'class="form-control form-control-lg"value="{{ $prop->value_en }}">
            </div>
            <div class="col-3 form-group">
                <label for="">key_ar</label>
                <input type="text" placeholder="Enter key_ar" name='key_ar'class="form-control form-control-lg"value="{{ $prop->key_ar}}">
            </div>
            <div class="col-3 form-group">
                <label for="">value_ar</label>
                <input type="text" placeholder="Enter value_ar" name='value_ar'class="form-control form-control-lg"value="{{ $prop->value_ar }}">
            </div>
        </div>
    </form>
    <div class="col-4">
            <h4>manage</h4>
            <button form="updateprop{{ $prop->id }}" class="btn btn-success btn-lg " type="submit"><i class="fa fa-check"></i></button>
            <button form="deleteprop{{ $prop->id }}" class="btn btn-danger btn-lg " type="submit"><i class="fa fa-trash"></i></button>
            <form method="post"id='deleteprop{{ $prop->id }}'action='{{ route('admin.deleteProductProp', ['id'=>$prop->id]) }}'>@csrf @method('DELETE')</form>
    </div>
        @empty
    <h4>not founded</h4>
        @endforelse
     </div>
        <div class="row">
            <h3 class="col-12">Product Sub_Images</h3>
             <div class="col-12">
                    <form class="col-12"method='post' action='{{ route('admin.addProductImage') }}' enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label >select image</label>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="file" class="form-control form-control-lg" name='path'>
                    </div>
                    <button class="btn btn-primary btn-lg mb-2" type="submit">Add sub_image</button>
                    </form>
                </div>
            <div>


            </div class='col-8'>
            @forelse ($product->images as $image)
            <div>
                <img src="{{ Storage::url($image->path) }}"  width="150px">
          

                <button form="deleteimage{{ $image->id }}" class="btn btn-danger btn-lg " type="submit"><i class="fa fa-trash"></i></button>
                <form method="post"id='deleteimage{{ $image->id }}'action='{{ route('admin.deleteProductImage', ['id'=>$image->id]) }}'>@csrf @method('DELETE')</form>
        </div>
            @empty
<h4>not founded</h4>
            @endforelse

     </div>
</div>
@endsection
