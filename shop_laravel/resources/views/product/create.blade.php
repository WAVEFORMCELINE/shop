@extends('layouts.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Добавить товар</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Интернет-магазин</a></li>
          <li class="breadcrumb-item active"><a href="{{ route('product.index') }}">Категории</a></li>
          <li class="breadcrumb-item active">Добавить товар</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
    <!-- /.content-header -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <form action="{{ route('product.store') }}" method="post">
        @csrf
        
        <div class="form-group">
          <input type="text" name ="name" class="form-control" placeholder="Наименование">
          <input type="text" name ="price" class="form-control" placeholder="Цена">
          <input type="text" name ="category_id" class="form-control" placeholder="Категория">
        </div>
      
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Добавить">
        </div>
    </div>
  </div>
</section>
@endsection