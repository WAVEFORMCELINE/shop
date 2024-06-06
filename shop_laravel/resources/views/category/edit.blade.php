@extends('layouts.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Редактировать категорию "{{ $category->name}}"</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Интернет-магазин</a></li>
          <li class="breadcrumb-item active"><a href="{{ route('category.index') }}">Категории</a></li>
          <li class="breadcrumb-item active">{{ $category->name }}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
    <!-- /.content-header -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <form action="{{ route('category.update', $category->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
          <label>Наименование</label>
          <input type="text" name ="name" value="{{ $category->name }}" class="form-control" placeholder="Наименование">
        </div>
        <div class="form-group">
          <label>Parent_id</label>
          <input type="text" name ="parent_id" value="{{ $category->parent_id }}" class="form-control" placeholder="Parent_id">
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Редактировать">
        </div>
    </div>
  </div>
</section>
@endsection