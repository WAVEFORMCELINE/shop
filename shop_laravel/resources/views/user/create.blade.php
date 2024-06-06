@extends('layouts.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Добавить пользователя</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Интернет-магазин</a></li>
          <li class="breadcrumb-item active"><a href="{{ route('user.index') }}">Пользователи</a></li>
          <li class="breadcrumb-item active">Добавить пользователя</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
    <!-- /.content-header -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <form action="{{ route('user.store') }}" method="post">
        @csrf
        
        <div class="form-group">
          <label>Имя пользователя</label>
          <input type="text" name ="name" class="form-control" placeholder="Имя пользователя">
          <label>E-mail</label>
          <input type="text" name ="email" class="form-control" placeholder="E-mail">
          <label>Пароль</label>
          <input type="text" name ="password" class="form-control" placeholder="Пароль">
        </div>
      
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Добавить">
        </div>
    </div>
  </div>
</section>
@endsection