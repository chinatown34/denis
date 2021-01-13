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
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $result)
                            <tr>
                                <td>{{ $result->id }}</td>
                                <td>{{ $result->author->name }}</td>
                                <td>{{ \Str::limit($result->description, 150) }}</td>
                                @if($result->moderated_at)
                                <td>{{ $result->rating }}</td>
                                <td>{{ $result->comment }}</td>
                                <td>{{ optional($result->moderator)->name }}</td>
                                <td>{{ optional($result->moderated_at)->format('d-m-Y H:i:s') }}</td>
                                @else 
                                <td colspan="4">оценка ожидается</td>
                                @endif
   
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
