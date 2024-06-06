@extends('layouts.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Отчёты</h1>
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

<div class="card">
  <div class="card-body p-0">
    <table class="table table-striped projects">
      <thead>
        <tr>
          <th style="width: 20%"> Отчёт </th>
          <th style="width: 60%"> Подробно </th>
          <th style="width: 20%"><div class="text-center"> Ссылка </div></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><a><b> 1. Список товаров </b></a><br></td>
          <td> Отобразить список всех категорий с товарами, чтобы была видна вложенность. </td>
          <td class="project-actions text-right"><a class="btn btn-primary btn-sm" href={{ route('api.sort')}} ><i class="fas fa-arrow-right"></i> Перейти </a></td>
        </tr>
        <tr>
          <td><a><b> 2. Отчёт покупок </b></a><br></td>
          <td> Генерация отчета покупок (по дням, количество покупок за последний месяц) в формате json или csv (оба варианта нужны). Формат нужно передавать параметром.</td>
          <td class="project-actions text-right">
          <a class="btn btn-success btn-sm" href="api/report/purchases?format=csv"> <i class="fas fa-file-csv"></i> CSV </a>
          <a class="btn btn-secondary btn-sm" href="api/report/purchases?format=json"> <i class="fas fa-clipboard-list"></i> JSON </a></td>
        </tr>
        <tr>
          <td><a></a><b>3. Сортировка или перемещение товаров</b></a><br></td>
          <td> Метод сортировки товара/категории внутри категории или перемещение в другую категорию. </td>
          <td class="project-actions text-right">
            <a class="btn btn-primary btn-sm" href=" {{ route('report.sort') }} "><i class="fas fa-arrow-right"></i> Перейти </a>
          <!-- <a class="btn btn-primary btn-sm" href=" {{ route('report.relocate') }} "><i class="fas fa-arrow-right"></i> Перемещение </a></td> -->
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection