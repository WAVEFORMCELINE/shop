@extends('layouts.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Товары</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Интернет-магазин</a></li>
          <li class="breadcrumb-item active">Товары</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
    <!-- /.content-header -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('product.create') }}" class="btn btn-primary">Добавить</a>
            </div>

                <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Наименование</th>
                      <th>Цена</th>
                      <th>Категория</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $product)
                    <tr>
                      <td>{{ $product->id }}</td>
                      <td><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></td>
                      <td>{{ $product->price }}</td>
                      <td><a href="{{ route('category.show', $product->category_id) }}">{{ $product->category()->where('id', $product->category_id)->value('name')}}</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
          </div>
        </div>
    </div>
  </div>
</section>
@endsection