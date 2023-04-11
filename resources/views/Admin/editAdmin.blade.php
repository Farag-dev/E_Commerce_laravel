@extends('Admin.layouts.app')
@section('title')
    Edit New Admin
@endsection
@section('content')

    <div class="card p-3 m-auto w-50">


    <form method="post" action="{{ route('admin.updateAdmin', ['id'=>$admin->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">code</label>
            <input type="text" placeholder="Enter Code" name='code'class="form-control form-control-lg" value="{{old('code',$admin->code ) }}">
            @error('code')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
            <label for="">name</label>
            <input type="text" placeholder="Enter name" name='name'class="form-control form-control-lg"value="{{ old('name',$admin->name)}}">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" placeholder="Enter password" name='password'class="form-control form-control-lg"value="{{ old('password')}}">
        </div>

            <button class="btn btn-primary btn-lg d-grid" type="submit">update Admin</button>

    </form>
</div>
@endsection
