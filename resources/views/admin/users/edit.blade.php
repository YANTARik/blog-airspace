
@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Добавить пользователя
        <small>приятные слова..</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      {{Form::open([
        'route' => ['users.update', $user->id],
        'method' => 'put',
        'files' => true
        ])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Изменяем пользователя</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Имя</label>
              <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="" value="{{$user->name}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Фаминия</label>
              <input type="text" class="form-control" name="lastname" id="exampleInputEmail1" placeholder="" value="{{$user->lastname}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">E-mail</label>
              <input type="text" class="form-control" name="email" id="exampleInputEmail1" placeholder="" value="{{$user->email}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Пароль</label>
              <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group">
              <img src="{{$user->getAvatar()}}" alt="" width="200" name="avatar" class="img-responsive">
              <label for="exampleInputFile">Аватар</label>
              <input type="file" id="exampleInputFile">
            </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-default">Назад</button>
          <button class="btn btn-warning pull-right">Изменить</button>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
      {{Form::close()}}
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
