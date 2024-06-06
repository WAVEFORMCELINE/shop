@extends('layouts.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Заказы</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Интернет-магазин</a></li>
          <li class="breadcrumb-item active">Заказы</li>
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
                <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>E-mail</th>
                      <th>Имя пользователя</th>
                      <th>Сумма заказа</th>
                      <th>Дата</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $order)
                    <tr>
                      <td>{{ $order->id }}</td>
                      <td>{{ $order->user()->where('id', $order->user_id)->value('email')}}</td>
                      <td>{{ $order->user()->where('id', $order->user_id)->value('name')}}</td>
                      <td>{{ $order->productsPrice() }}</td>
                      <td>{{ $order->created_at }}</td>
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