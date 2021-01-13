
  <div class="card-body">

    <div class="form-group">
      <label>Описание</label>
      <p>{{ $result->description }}</p>
    </div>
    <div class="form-group">
      <label>Автор</label>
      <p>{{ $result->author->name }}</p>
    </div>
    <div class="form-group">
      <label>Оценка</label>
      {{ Form::text('rating', $result->rating, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      <label>Комментарий</label>
      {{ Form::textarea('comment', $result->comment, ['class' => 'form-control']) }}
    </div>

  </div>

  {{ Form::hidden('person_id', $result->person_id) }}
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Сохранить</button>
  </div>
 