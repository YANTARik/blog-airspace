@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить комментарий
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                {!! Form::open(['route' => 'comments.store']) !!}
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем комментарий</h3>
                    @include('admin.errors')

                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Статья</label>
                            {{Form::select('post_id',
                                $posts,
                                null,
                                ['class' => 'form-control select2','data-placeholder'=>'Выберите статью'])
                            }}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Комментарий</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="text">
                        </div>
                        <div class="form-group">
                            <label>Автор</label>
                            {{Form::select('user_id',
                                $users,
                                null,
                                ['class' => 'form-control select2', 'data-placeholder'=>'Выберите теги', 'data-placeholder'=>'Выберите автора'])
                            }}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('comments.index')}}" class="btn btn-default">Назад</a>
                    <button class="btn btn-success pull-right">Добавить</button>
                </div>
                <!-- /.box-footer-->
                {!! Form::close() !!}
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection