@extends('Admin.layouts.app')
@section('title')
Home
@endsection
@section('content')

    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ \App\Models\Order::query()->count() }}</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ \App\Models\Category::query()->count() }}</h3>

              <p>Category</p>
            </div>
            <div class="icon">
                <i class="fa fa-dot-circle"></i>
            </div>
            <a href="{{ route('admin.category') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ \App\Models\Admin::query()->count() }}</h3>

              <p>Admins</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="{{ route('admin.allAdmin') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ \App\Models\Product::query()->count() }}</h3>

              <p>products</p>
            </div>
            <div class="icon">
              <i class="fa fa-landmark"></i>
            </div>
            <a href="{{ route('admin.Product') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </div>
      <!-- /.row -->
      <!-- Main row -->
@endsection
