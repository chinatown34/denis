@extends('layouts.main')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Оценка модели</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

        <div class="row">

            <div class="col-6">
              @include('result.partials.card_no_models')
            </div>

          </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection

