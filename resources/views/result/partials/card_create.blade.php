<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Оценка модели</h3>
  </div>


  {!! \Form::open(['class' => '', 'method' => 'POST', 'route' => 'result.store']); !!}

  @include('result.form_create')

  {!! Form::close(); !!}

</div>