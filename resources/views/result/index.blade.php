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
                            <th>Автор</th>
                            <th>Описание</th>
                            <th>Оценка</th>
                            <th>Комментарий</th>
                            <th>Модератор</th>
                            <th>Дата оценки</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $result)
                            <tr>
                                <td>{{ $result->id }}</td>
                                <td>{{ $result->author->name }}</td>
                                <td>{{ \Str::limit($result->description, 150) }}</td>
                                <td>{{ $result->rating }}</td>
                                <td>{{ $result->comment }}</td>
                                <td>{{ optional($result->moderator)->name }}</td>
                                <td>{{ optional($result->moderated_at)->format('d-m-Y H:i:s') }}</td>
   
                                <td>
                                    <a class="btn btn-outline-primary" href="{{ route('result.edit', $result) }}"><i class="fas fa-edit"></i></a>
                                    @can('delete', $result)
                                    <a class="btn btn-outline-danger" href="{{ route('result.destroy', $result) }}" onclick="return confirmDelete();"><i class="fas fa-trash"></i></a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                      {{ $results->links() }}
                    </div>
                  </div>


            </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection
