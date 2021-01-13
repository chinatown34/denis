<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Оценка модели</h3>
  </div>


  {!! \Form::open(['class' => '', 'method' => 'PUT', 'route' => ['result.update', $result]]); !!}

  @include('result.form_update')

  {!! Form::close(); !!}

</div>