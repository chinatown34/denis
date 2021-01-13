@extends('layouts.main')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ $title }}</h1>
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

                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">{{ $title }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered">
                        <thead>                  
                          <tr>
                            <th>#</th>
                            <th>Загрузил</th>
                            <th>Пол</th>
                            <th>Описание человека из жизни</th>
                            <th>Описание эксперта</th>
                            <th>Модератор</th>
                            <th>Плохие фото</th>
                            <th>Промодерировано</th>
                            <th><a class="btn btn-outline-success" href="{{ route('person.create') }}">Добавить</a></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($persons as $person)
                            <tr>
                                <td>{{ $person->id }}</td>
                                <td>{{ $person->author->name }}</td>
                                <td>{{ $person->genderAsString }}</td>
                                <td>{{ \Str::limit($person->description, 150) }}</td>
                                <td>{{ \Str::limit($person->description_expert, 150) }}</td>
                                <td>{{ optional($person->moderator)->name }}</td>
                                <td>
                                  @if($person->bad_photos_flag)
                                  <i class="fas fa-check"></i>
                                  @endif
                                </td>
                                <td>
                                  @if($person->moderated_flag)
                                  <i class="fas fa-check"></i>
                                  @endif
                                </td>
                                <td>
                                    <a class="btn btn-outline-primary" href="{{ route('person.edit', $person) }}"><i class="fas fa-edit"></i></a>
                                    @can('delete', $person)
                                    <a class="btn btn-outline-danger" href="{{ route('person.destroy', $person) }}" onclick="return confirmDelete();"><i class="fas fa-trash"></i></a>
                                    @endcan
                                  </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                      {{ $persons->links() }}
                    </div>
                  </div>


            </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection
