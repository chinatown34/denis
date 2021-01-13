
  <div class="card-body">
    <div class="form-group">
      <label>Имя</label>
      {{ Form::text('name', $user->name, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      <label>Роль</label>
      {{ Form::select('role', config('settings.userRoles'), $user->role, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      <label>Email</label>
      {{ Form::text('email', $user->email, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      <label>Телефон</label>
      {{ Form::text('phone', $user->phone, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      <label>Номер курса</label>
      {{ Form::text('course_number', $user->course_number, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      <label>Пароль</label>
      {{ Form::password('password', ['class' => 'form-control']) }}
    </div>
    @if(is_null($user->id))
    <div class="form-group">
      <label>Повтор пароля</label>
      {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
    </div>
    @endif
  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Сохранить</button>
  </div>
 