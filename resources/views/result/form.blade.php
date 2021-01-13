
  <div class="card-body">
    @if(!is_null($person->id))
    <div class="form-group">
      <label>Загрузил</label>
      {{ Form::text('author', $person->author->name, ['class' => 'form-control', 'disabled' => true]) }}
    </div>
    
    <div class="form-check">
      <div class="form-group">
      {{ Form::hidden('moderated_flag', 0) }}
      {{ Form::checkbox('moderated_flag', 1, $person->moderated_flag) }}
      <label class="form-check-label">Промодерировано</label>
      </div>
    </div>

    <div class="form-check">
      <div class="form-group">
      {{ Form::hidden('bad_photos_flag', 0) }}
      {{ Form::checkbox('bad_photos_flag', 1, $person->bad_photos_flag) }}
      <label class="form-check-label">Плохие фото</label>
      </div>
    </div>

    @endif
    <div class="form-group">
      <label>Пол</label>
      {{ Form::select('gender', config('settings.genderForSelect'), $person->gender, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
      <label>Описание</label>
      {{ Form::textarea('description', $person->description, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
      <label>Описание эксперта</label>
      {{ Form::textarea('description_expert', $person->description_expert, ['class' => 'form-control']) }}
    </div>

    @if(is_null($person->id))

    <div class="form-group">
      <label>Главное фото</label>
      <div class="input-group">
        <div class="custom-file">
          <input type="file" name="pic" class="custom-file-input">
          <label class="custom-file-label">Выбрать файл</label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label>Дополнительные фото</label>
      <div class="input-group">
        <div class="custom-file">
          <input type="file" name="pics[]" class="custom-file-input" multiple>
          <label class="custom-file-label">Выбрать файл</label>
        </div>
      </div>
    </div>


    @endif
  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Сохранить</button>
  </div>
 