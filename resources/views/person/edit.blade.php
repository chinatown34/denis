@extends('layouts.main')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Редактирование модели</h1>
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

              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Редактирование модели</h3>
                </div>


                {!! \Form::open(['class' => '', 'method' => 'PUT', 'route' => ['person.update', $person]]); !!}

                @include('person.form')

                {!! Form::close(); !!}

              </div>
            </div>

            <div class="col-6">

              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">Фото</h3>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-2">
                    <a data-fancybox="gallery" href="{{ $person->photo }}" ><img class="img-fluid img-thumbnail mb-2" src="{{ $person->photo }}"></a>
                    </div>
                    @foreach($person->photos as $photo)
                        <div class="col-2">
                        <a data-fancybox="gallery" href="{{ $photo->photo }}"><img class="img-fluid img-thumbnail mb-2" src="{{ $photo->photo }}"></a>
                        </div>
                    @endforeach
                    </div>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection
