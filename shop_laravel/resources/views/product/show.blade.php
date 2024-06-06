@extends('layouts.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"><a href={{route('product.index')}}>Товары/</a>{{ $product->name }}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Интернет-магазин</a></li>
          <li class="breadcrumb-item"><a href={{ route('product.index') }}>Товары</a></li>
          <li class="breadcrumb-item active">{{ $product->name }}</li>
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
          <div class="card-header d-flex p-3">
            <div class="mr-3">
            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Изменить</a>
            </div>
            <form action="{{ route('product.delete', $product->id)}}" method="post">
              @csrf
              @method('delete')
              <input type="submit" class="btn btn-danger" value="Удалить">
            </form>
          </div>
                <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <tbody>
                    <tr>
                      <td><b>ID</b></td>
                      <td>{{$product->id}}</td>
                    </tr>
                    <tr>
                      <td><b>Наименование</b></td>
                      <td>{{$product->name}}</td>
                    </tr>
                    <tr>
                      <td><b>Цена</b></td>
                      <td>{{$product->price}}</td>
                    </tr>
                    <tr>
                      <td><b>Категория</b></td>
                      <td><a href="{{ route('category.show', $product->category_id) }}">{{ $product->category()->where('id', $product->category_id)->value('name')}}</a></td>
                    </tr>
                    <tr>
                      <td><b>Дата создания</b></td>
                      <td>{{$product->created_at->format('d/m/Y H:i:s')}}</td>
                    </tr>
                    <tr>
                      <td><b>Изменено:</b></td>
                      <td>{{$product->updated_at->format('d/m/Y H:i:s')}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
          </div>
        </div>
    </div>
  </div>
</section>
@endsection