@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Добавление Пользователя</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

        <div class="row">
            <div class="col-12">

              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Новый пользователь</h3>
                </div>

                {!! \Form::open(['class' => '', 'method' => 'POST', 'route' => 'user.store']); !!}

                @include('user.form')

                {!! Form::close(); !!}
              </div>
              </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->


@endsection
