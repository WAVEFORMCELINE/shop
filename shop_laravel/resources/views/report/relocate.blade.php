@extends('layouts.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"><a href={{route('report.index')}}>Отчёт/</a>Перемещение</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('index') }}">Интернет-магазин</a></li>
          <li class="breadcrumb-item active">Отчёты</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="product_id">Выберите товар</label>
        <select id="product_id" name="product_id" class="form-control select2" style="width: 100%;">
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
    </div>
    <p></p>
    <div class="form-group">
        <label for="category_id">Выберите категорию</label>
        <select id="category_id" name="category_id" class="form-control select2" style="width: 100%;">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <p></p>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Переместить</button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $("#submitButton").click(function(e) {
    e.preventDefault();
    var product_id = $("product_id").val();
    var category_id = $("category_id").val();

    $.ajax({
      url: "{{ route('api.moveProduct') }}", 
      method: "PUT",
      data: {
        product_id: product_id,
        category_id: category_id
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

<!-- http://127.0.0.1:8000/api/products/2/move?category_id=10 -->
@endsection