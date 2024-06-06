@extends('layouts.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"><a href={{route('report.index')}}>Отчёт/</a>Сортировка</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('index') }}">Интернет-магазин</a></li>
          <li class="breadcrumb-item active">Отчёты</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="col-md-6">
    <div class="form-group">
        <label>Параметры API (Сортировка товаров)</label>
        <select id="sortField" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
            <option value="name">По имени</option>
            <option value="price">По цене</option>
        </select>
        <p></p>
        <select id="sortOrder" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
            <option value="asc">По возрастанию</option>
            <option value="desc">По убыванию</option>
        </select>
        <label>При нажатии на кнопку ответ придёт в консоль в виде JSON</label>
        <div class="form-group">
            <button id="submitButton" class="btn btn-primary">Перейти</button>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $("#submitButton").click(function(e) {
    e.preventDefault();

    var sortField = $("#sortField").val();
    var sortOrder = $("#sortOrder").val();

    $.ajax({
      url: "{{ route('api.sort') }}", 
      method: "GET",
      data: {
        sortBy: sortField,
        order: sortOrder
      },
      success: function(response) {
        console.log(response); 
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.error(jqXHR, textStatus, errorThrown);
      }
    });
  });
});
</script>
@endsection