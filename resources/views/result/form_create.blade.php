
  <div class="card-body">

    <div class="form-group">
      <label>Описание</label>
      <p>{{ $result->description }}</p>
      {{ Form::textarea('description', $result->description, ['class' => 'form-control']) }}
    </div>

  </div>
  <!-- /.card-body -->

  {{ Form::hidden('person_id', $result->person_id) }}
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Сохранить</button>
  </div>
 