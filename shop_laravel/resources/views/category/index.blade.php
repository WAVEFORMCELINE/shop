@extends('layouts.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Категории</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Интернет-магазин</a></li>
          <li class="breadcrumb-item active">Категории</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
    <!-- /.content-header -->
<section class="content">


<div class="card">
    <div class="card-header">
     <a href="{{ route('category.create') }}" class="btn btn-primary">Добавить</a>
    </div>
    <div class="card-body">
        <table id="categoryTable" class="table table-bordered table-hover">
            <tbody>
                @foreach($categories as $category)
                    @include('category.partials.category_row', ['category' => $category, 'level' => 0])
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.expandable').click(function() {
            $(this).siblings('.child-row').toggle();
        });
    });
</script>



</section>
@endsection