<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Оценка модели</h3>
  </div>

    <div class="card-body">

      <h3>Описание из жизни</h3>
      <p>{{ $result->person->description }}</p>
      <h3>Описание эксперта</h3>
      <p>{{ $result->person->description_expert }}</p>
      <h3>Ваше Описание</h3>
      <p>{{ $result->description }}</p>
    </div>


</div>