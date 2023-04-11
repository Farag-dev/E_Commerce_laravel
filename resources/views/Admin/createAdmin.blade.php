@extends('Admin.layouts.app')
@section('title')
    Create New Admin
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

    <form method="post" action="{{ route('admin.storeAdmin') }}">
        @csrf
        <div class="form-group">
            <label for="">code</label>
            <input type="text" placeholder="Enter Code" name='code'class="form-control form-control-lg" value="{{ old('code') }}">
        </div>
        <div class="form-group">
            <label for="">name</label>
            <input type="text" placeholder="Enter name" name='name'class="form-control form-control-lg"value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" placeholder="Enter password" name='password'class="form-control form-control-lg"value="{{ old('password') }}">
        </div>

            <button class="btn btn-primary btn-lg d-grid" type="submit">Add Admin</button>

    </form>
</div>
@endsection
